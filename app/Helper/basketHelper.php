<?php

namespace App\Helper;

use App\Http\Controllers\front\basket\indexController;
use App\Models\Basket;
use App\Models\Book;
use App\Models\SessionBasket;
use SebastianBergmann\CodeCoverage\StaticAnalysisCacheNotConfiguredException;

class basketHelper
{
    public static function addBasket($book_id, $quantity, $price)
    {
        $session_id = session()->get('session_id');
        $basket = SessionBasket::where('book_id', '=', $book_id)->first();
        if (empty($session_id)) {
            $session_id = uniqid();
            session()->put('session_id', $session_id);
        }
        if ($basket) {
            $basket->quantity = $quantity;
            $basket->price = $price;
            $basket->save();
            if ($basket) {
                return indexController::selectBasket();
            }
        } else {
            $array =
                [
                    'session_id' => $session_id,
                    'book_id' => $book_id,
                    'quantity' => $quantity,
                    'price' => $price
                ];
            $insert = SessionBasket::create($array);
            if ($insert) {
                return indexController::selectBasket();
            }
        }
    }

    public static function addBasketTable($user_id, $book_id, $quantity, $price, $d = null)
    {
        $basket = Basket::where('book_id', $book_id)->where('user_id', $user_id)->first();
        $book = Book::where('id', $book_id)->first();
        if ($basket) {
            $defaultQuantity = $book->quantity + $basket->quantity;
            if ($defaultQuantity > ($basket->quantity + $quantity)) {
                $book->quantity -= $quantity;
                $basket->quantity += $quantity;
                $basket->price = $book->amount * $basket->quantity;
            } elseif($defaultQuantity < ($basket->quantity + $quantity)) {
                if ($book->quantity != 0) {
                    $basket->quantity += $book->quantity;
                    $basket->price = $book->amount * $basket->quantity;
                    $book->quantity = 0;
                } else {
                    return 0;
                }
            }
            $book->save();
            $basket->save();
            if ($basket && $d == null) {
                return indexController::selectBasket();
            } elseif ($basket && $d == 'comp') {
                $w =
                    [
                        'name' => $basket->book->name,
                        'image' => asset($basket->book->image),
                        'quantity' => $basket->quantity,
                        'price' => $basket->price,
                        'id' => $basket->id
                    ];
                return $w;
            }
        } else {
            $array =
                [
                    'user_id' => $user_id,
                    'book_id' => $book_id,
                    'quantity' => $quantity,
                    'price' => $price
                ];
            $insert = Basket::create($array);
            if ($insert) {
                $book = Book::where('id', '=', $book_id)->first();
                $basket = Basket::where('book_id', $book_id)->where('user_id', $user_id)->first();
                $book->quantity -= $basket->quantity;
                $book->save();
                if ($d == null) {
                    return indexController::selectBasket();
                } elseif ($d == 'comp') {
                    $w =
                        [
                            'name' => $basket->book->name,
                            'image' => asset($basket->book->image),
                            'quantity' => $basket->quantity,
                            'price' => $basket->price,
                            'id' => $basket->id
                        ];
                    return $w;
                }
            }
        }
    }

    public static function deleteBasketTable($id = null, $user_session_id = null, $session = null)
    {
        if ($id !== null && $session == null) {
            $basket = Basket::where('id', $id)->first();
            $book = Book::where('id', $basket->book_id)->first();
            $book->quantity += $basket->quantity;
            if ($book->save()) {
                $basket->delete();
                if ($basket) {
                    return indexController::selectBasket();
                }
            } else {
                return false;
            }
        } elseif ($id !== null && $session == 'session') {
            $basket = SessionBasket::where('id', '=', $id)->first();
            $book = Book::where('id', '=', $basket->book_id)->first();
            //$book->quantity = $basket->quantity + $book->quantity;
            if ($book->save()) {
                $basket->delete();
                if ($basket) {
                    return indexController::selectBasket();
                }
            } else {
                return false;
            }
        } elseif ($user_session_id !== null && $session == null) {
            $baskets = Basket::where('user_id', $user_session_id)->get();
            foreach ($baskets as $basket) {
                $book = Book::find($basket->book_id);
                $book->quantity = $basket->quantity + $book->quantity;
                $book->save();
                $basket->delete();
            }
            return indexController::selectBasket();
        } elseif ($user_session_id !== null && $session == 'session') {
            $baskets = SessionBasket::where('session_id', '=', $user_session_id);
            foreach ($baskets as $basket) {
                $book = Book::find($basket->book_id);
                $book->quantity = $basket->quantity + $book->quantity;
                $book->save();
                $basket->delete();
            }
            return indexController::selectBasket();
        }
    }
}
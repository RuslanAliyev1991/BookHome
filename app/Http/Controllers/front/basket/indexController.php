<?php

namespace App\Http\Controllers\front\basket;

use App\Models\Book;
use App\Models\User;
use App\Models\Basket;
use App\Helper\basketHelper;
use Illuminate\Http\Request;
use App\Models\SessionBasket;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as AuthUser;
use PhpParser\Node\Expr\Cast\Double;

class indexController extends Controller
{

    public static function selectBasket()
    {
        if (Auth::user()) {
            $sum = Basket::where('user_id', '=', Auth::id())->sum('price');
            return $sum;
        } else if (Auth::guest()) {
            $sum = SessionBasket::where('session_id', '=', session()->get('session_id'))->sum('price');
            return $sum;
        }
    }

    // add to basket:
    public function add(Request $request)
    {
        // return $request;
        $count = Book::where('id', '=', $request->id)->count();
        if ($count != 0) {
            $book = Book::find($request->id);
            $quantity = $book->quantity;
            $price = $book->amount;
            $book_id = (int)$book->id;
            $request->quantity = (int)$request->quantity;
            $price *= $request->quantity;
            // if ($request->quantity > $quantity) {
            //     return $quantity;
            // }
            if (Auth::user()) {
                return basketHelper::addBasketTable(Auth::id(), $book_id, $request->quantity, $price, $request->d);
                //return $book;
            } elseif (Auth::guest()) {
                return basketHelper::addBasket($book_id, $request->quantity, $price, $request->d);
            }
        } else {
            return redirect('/');
        }
    }

    public function showShopping()
    {
        $baskets = Basket::where('user_id', '=', Auth::id())->get();
        return view('front.basket.index', ['baskets' => $baskets]);
    }

    public function updateShopping(Request $request)
    {
        $basket = Basket::where('id', $request->id)->first();
        $book = Book::where('id', $basket->book_id)->first();
        if ($book->quantity != 0) {
            if ($request->quantity > $basket->quantity) {
                $book->quantity -= ($request->quantity - $basket->quantity);
                $book->save();
                $basket->quantity = $request->quantity;
                $basket->price = $book->amount * $basket->quantity;
                $basket->save();
            } elseif ($request->quantity < $basket->quantity) {
                $book->quantity += ($basket->quantity - $request->quantity);
                $book->save();
                $basket->quantity = $request->quantity;
                $basket->price = $book->amount * $basket->quantity;
                $basket->save();
            }
            $prices =
                [
                    'price' => $basket->price,
                    'sumprice' => self::selectBasket(),
                    'quantity'=>$book->quantity,
                    'basketQuan'=>$basket->quantity
                ];
            return $prices;
        }
        return $basket;
    }

    // completed shopping:
    public function completedShopping(Request $request)
    {
        return $request;
    }

    public function delete(Request $request)
    {
        return basketHelper::deleteBasketTable($request->id, $request->user_id, $request->session);
    }
}
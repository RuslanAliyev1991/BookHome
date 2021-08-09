<?php

namespace App\Http\Controllers\front\book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index($selflink)
    {
        $count = Book::where('selflink', '=', $selflink)->count();
        if ($count != 0) {
            $data['data'] = Book::where('selflink', '=', $selflink)->get();
            return view('front.Book.index', $data);
        } else {
            return redirect('/');
        }
    }
}

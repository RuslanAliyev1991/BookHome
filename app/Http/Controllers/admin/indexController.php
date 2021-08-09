<?php

namespace App\Http\Controllers\admin;

use App\Models\Slider;
use App\Helper\mHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}

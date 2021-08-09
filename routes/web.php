<?php


use App\Http\Controllers\admin\indexController;
use App\Http\Controllers\admin\author\indexController as AuthorIndexController;
use App\Http\Controllers\admin\book\indexController as bookIndexController;
use App\Http\Controllers\admin\category\indexController as CategoryIndexController;
use App\Http\Controllers\admin\slider\indexController as SliderIndexController;
use App\Http\Controllers\admin\publishing\indexController as PublishingIndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\axController;
use App\Http\Controllers\front\basket\indexController as BasketIndexController;
use App\Http\Controllers\front\book\indexController as FrontBookIndexController;
use App\Http\Controllers\front\indexController as FrontindexController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/ajax', function(){
//     return view('ayax');
// });

// Route::post('/ajax/gonder', [axController::class, 'test'])->name('ajax.post');




Route::get('/', [FrontindexController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index']);
Route::post('/home', [LoginController::class, 'logout']);
Route::get('/book/about/{selflink}', [FrontBookIndexController::class, 'index'])->name('book.about');

Auth::routes();
Route::post('/basket/add', [BasketIndexController::class, 'add'])->name('basket.add');
Route::get('/basket/completed', [BasketIndexController::class, 'completedShopping'])->name('basket.completed');
Route::get('/basket/show', [BasketIndexController::class, 'showShopping'])->name('basket.show');
Route::get('/basket/delete', [BasketIndexController::class, 'delete'])->name('basket.delete');

Route::get('/load', [BasketIndexController::class, 'selectBasket'])->name('basket.select');
Route::get('/basket/update', [BasketIndexController::class, 'updateShopping'])->name('basket.update');






Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [indexController::class, 'index'])->name('index');

    // Publishing:
    Route::group(['namespace' => 'publishing', 'prefix' => 'publishing', 'as' => 'publishing.'], function () {
        Route::get('/', [PublishingIndexController::class, 'index'])->name('index');
        Route::get('/create', [PublishingIndexController::class, 'create'])->name('create');
        Route::post('/create', [PublishingIndexController::class, 'store'])->name('create.post');

        // Publishing evi ucun silme ve yenileme:
        Route::get('/edit/{id}', [PublishingIndexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [PublishingIndexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}', [PublishingIndexController::class, 'delete'])->name('delete');
    });

    // Author:
    Route::group(['namespace' => 'author', 'prefix' => 'author', 'as' => 'author.'], function () {
        Route::get('/', [AuthorIndexController::class, 'index'])->name('index');
        Route::get('/create', [AuthorIndexController::class, 'create'])->name('create');
        Route::post('/create', [AuthorIndexController::class, 'store'])->name('create.post');

        // Author ucun silme ve yenileme:
        Route::get('/edit/{id}', [AuthorIndexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [AuthorIndexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}', [AuthorIndexController::class, 'delete'])->name('delete');
    });

    // book:
    Route::group(['namespace' => 'book', 'prefix' => 'book', 'as' => 'book.'], function () {
        Route::get('/', [bookIndexController::class, 'index'])->name('index');
        Route::get('/create', [bookIndexController::class, 'create'])->name('create');
        Route::post('/create', [bookIndexController::class, 'store'])->name('create.post');

        // book ucun silme ve yenileme:
        Route::get('/edit/{id}', [bookIndexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [bookIndexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}', [bookIndexController::class, 'delete'])->name('delete');
    });

    // Category:
    Route::group(['namespace' => 'category', 'prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', [CategoryIndexController::class, 'index'])->name('index');
        Route::get('/create', [CategoryIndexController::class, 'create'])->name('create');
        Route::post('/create', [CategoryIndexController::class, 'store'])->name('create.post');

        // Publishing evi ucun silme ve yenileme:
        Route::get('/edit/{id}', [CategoryIndexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [CategoryIndexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}', [CategoryIndexController::class, 'delete'])->name('delete');
    });

    // slider:
    Route::group(['namespace' => 'slider', 'prefix' => 'slider', 'as' => 'slider.'], function () {
        Route::get('/', [SliderIndexController::class, 'index'])->name('index');
        Route::get('/create', [SliderIndexController::class, 'create'])->name('create');
        Route::post('/create', [SliderIndexController::class, 'store'])->name('create.post');

        // Publishing evi ucun silme ve yenileme:
        Route::get('/edit/{id}', [SliderIndexController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [SliderIndexController::class, 'update'])->name('edit.post');
        Route::get('/delete/{id}', [SliderIndexController::class, 'delete'])->name('delete');
    });
});
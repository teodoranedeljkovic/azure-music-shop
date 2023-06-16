<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;


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

Route::get('/',[FrontController::class, 'home'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/author',[FrontController::class, 'author'])->name('author');
Route::get('/contact',[FrontController::class, 'contact'])->name('contact');
Route::post('/contact',[FrontController::class, 'sendEmail']);


Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'login']);

Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'register']);

Route::middleware('loggedIn')->group(function () {
    Route::get('/logout',[LogoutController::class, 'logout'])->name('logout');

    Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::post('/cart', [\App\Http\Controllers\CartController::class, 'store']);
    Route::put('/cart', [\App\Http\Controllers\CartController::class, 'changeQuantity']);
    Route::delete('/cart', [\App\Http\Controllers\CartController::class, 'destroy']);

    Route::get('/order', [\App\Http\Controllers\OrderController::class, 'index'])->name('order');
    Route::post('/order', [\App\Http\Controllers\OrderController::class, 'order']);

    Route::get('/orders', [\App\Http\Controllers\FrontController::class, 'orders'])->name('orders');
});

Route::prefix('admin')->group(function () {
    Route::middleware('isAdmin')->group(function() {
        Route::get('/home',[\App\Http\Controllers\BackController::class, 'home'])->name('admin.home');
        Route::resource("/albums", 'AlbumController');
        Route::get('/orders',[\App\Http\Controllers\BackController::class, 'orders'])->name('admin.orders');
        Route::get('/useractions',[\App\Http\Controllers\BackController::class, 'useractions'])->name('useractions');
    });
});

Route::get('/albums', [FrontController::class, 'albums'])->name('home.albums');


//Route::resource('/albums','AlbumController');

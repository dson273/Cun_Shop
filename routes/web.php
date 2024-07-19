<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ViewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/view', [ViewController::class,'index'])->name('view.index');
Route::get('/view-detail/{product}', [ViewController::class,'detail'])->name('view-detail.detail');
Route::get('/view-cate', [ViewController::class,'cate'])->name('view-cate.cate');

Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');

Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout.show');
Route::post('/checkout', [CartController::class, 'placeOrder'])->name('checkout.placeOrder');
Route::get('/thank-you', [CartController::class, 'thankYou'])->name('checkout.thankyou');



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [ViewController::class, 'index'])->name('view.index');

Route::get('/view-detail/{product}', [ViewController::class,'detail'])->name('view-detail.detail');
Route::get('/cate', [ViewController::class, 'cate'])->name('view-cate.cate');


Route::middleware('auth')->group(function () {
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');

Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout.show');
Route::post('/checkout', [CartController::class, 'placeOrder'])->name('checkout.placeOrder');
Route::get('/thank-you', [CartController::class, 'thankYou'])->name('checkout.thankyou');
});

//đăng ký
Route::get('auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('auth/register', [RegisterController::class, 'register'])->name('register');

//Đăng nhập
Route::get('auth/verify/{token}', [LoginController::class, 'verify'])->name('verifyEmail');
Route::get('auth/login', [LoginController::class, 'index'])->name('login');
Route::post('auth/login', [LoginController::class, 'login'])->name('login');
Route::get('auth/logout', [LoginController::class, 'logout'])->name('logout');



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PromotionController;

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



Route::prefix('admin')->as('admin.')->middleware('isAdmin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    //Quản lý danh mục
    Route::resource('categories', CategoryController::class);
    //Quản lý sản phẩm
    Route::resource('products', ProductController::class);
    // Quản lý khuyến mại
    Route::resource('promotions', PromotionController::class);
    // Quản lý banner marketing
    Route::resource('banners', BannerController::class);
    // Quản lý hóa đơn
    Route::resource('invoices', InvoiceController::class);
    Route::post('/invoices/{id}/send-email', [InvoiceController::class, 'sendEmail'])->name('invoices.sendEmail');
});

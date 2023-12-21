<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OutCartController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
// Trong file routes/web.php



Route::get('/', [HomeController::class, 'index']);

Route::get('/trang-chu', [HomeController::class, 'index'])->name('trangchu');
Route::get('/gioi-thieu', [HomeController::class, 'gioithieu'])->name('gioithieu');
Route::get('/dich-vu', [HomeController::class, 'dichvu'])->name('dichvu');
Route::get('/lien-he', [HomeController::class, 'lienhe'])->name('lienhe');
Route::post('/lien-he', [HomeController::class,'guimail'])->name('lienhe1');
Route::get('/san-pham', [HomeController::class, 'sanpham'])->name('sanpham');
Route::get('/san-pham/{slug}', [HomeController::class, 'danhmuc'])->name('danhmuc');
Route::get('chi-tiet-san-pham/{id}',[HomeController::class, 'show'])
->name('chitietsanpham');


Route::post('add-to-cart/{id}',[HomeController::class, 'postAddToCart'])
->name('themgiohang');

Route::get('del-to-cart/{id}',[HomeController::class, 'getDelCart'])
->name('xoagiohang');

Route::get('dat-hang',[HomeController::class, 'getCheckout'])
->name('dathang');
Route::post('dat-hang',[HomeController::class, 'postCheckout'])
->name('dathang2');

Route::get('search',[HomeController::class, 'Search'])
->name('timkiem');

Route::get('/admin', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('admin');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('products', ProductController::class);
    Route::resource('slides', SlideController::class);
    Route::resource('type_products', ProductTypeController::class);
    Route::resource('users',UserController::class);
    Route::resource('hinhanhs',ProductImageController::class);
    Route::resource('outcarts',OutCartController::class);
});

require __DIR__.'/auth.php';

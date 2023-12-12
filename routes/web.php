<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CartController;


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
// Home
Route::get('/', [HomeController::class, 'index']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// Login & Register
Route::get('/register', [AuthController::class, 'rindex']);
Route::post('/register', [AuthController::class, 'rstore']);
Route::get('/login', [AuthController::class, 'lindex'])->name('login');
Route::post('/login',[AuthController::class,'store']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::resource('/admin', AdminController::class);
// About
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Contact
Route::get('/contact', [ContactController::class, 'index']);
// Category
Route::resource('/category', CategoryController::class);

// user
Route::resource('/user', UserController::class);
Route::get('/profile', PenggunaController::class);
Route::post('/profile', [PenggunaController::class, 'update']);
Route::get('/history',  [PenggunaController::class, 'index']);
Route::get('/struk/{id}', [PenggunaController::class, 'struk']);

// Faq
Route::resource('/faq', FaqController::class);
// Product
Route::resource('/product', ProductController::class);
Route::post('/product', [ProductController::class, 'store'])->name('product');
Route::get('/product', [ProductController::class,'index'])->name('product.index');
Route::post('/product', [ProductController::class,'store'])->name('product.store');
Route::post('/product', [ProductController::class, 'store'])->name('product');
Route::get('/produk', [ProductController::class,'lindex']);
Route::get('/product/search',[ProductController::class, 'search'] );
Route::get('/detail_produk/{id}', [ProductController::class, 'show'])->name('detail_produk');

// cart
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.store');
Route::get('cart/delete/{id}', [CartController::class, 'destroyItem'])->name('cart.item.destroy');


// // transaksi
Route::post('/pesan/{id}', [PenggunaController::class, 'pesan']);
Route::get('/check_out', [PenggunaController::class, 'check_out']);
Route::get('/konfirmasi', [PenggunaController::class, 'konfirmasi']);
Route::get('/keranjang/{id}/delete', [PenggunaController::class, 'delete']);


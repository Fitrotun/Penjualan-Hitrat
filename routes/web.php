<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;


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
// Route::get('/transaksilist', [AdminController::class, 'transaction']);
Route::get('transaksi', [AdminTransaksiController::class, 'index'])->name('transaksi.index');
Route::get('transaksi/{id}/edit', [AdminTransaksiController::class, 'edit'])->name('transaksi.edit');
Route::put('transaksi/{id}', [AdminTransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');
Route::get('transaksi/report', [AdminTransaksiController::class, 'printReport'])->name('transaksi.printReport');

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


// Faq
Route::resource('/faq', FaqController::class);

// Product
// Route::resource('/product', ProductController::class);
Route::post('/product', [ProductController::class, 'store'])->name('product');
Route::get('/product', [ProductController::class,'index'])->name('product.index');
Route::get('/product/create', [ProductController::class,'create'])->name('product.create');
Route::post('/product', [ProductController::class,'store'])->name('product.store');
Route::get('/product/{id}', [ProductController::class,'show'])->name('product.show');
Route::get('/product/{id}/edit', [ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class,'update'])->name('product.update');
Route::get('/produk', [ProductController::class,'lindex']);
Route::get('/detail_produk/{id}', [ProductController::class, 'show'])->name('detail_produk');
Route::get('search',[ProductController::class, 'searchProduct']);

// cart
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.store');
Route::get('cart/delete/{id}', [CartController::class, 'destroyItem'])->name('cart.item.destroy');

Route::get('order', [OrderController::class, 'index'])->name('order.index');
Route::get('order/{id}', [OrderController::class, 'show'])->name('order.show');
Route::post('order/add', [OrderController::class, 'store'])->name('order.store');
Route::get('order/delete/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

// // transaksi
// Route::put('/upload/{id}', [OrderController::class, 'epesan']);
Route::put('/upload/{id}', [OrderController::class, 'uploadPembayaran']);
Route::get('/konfirmasi', [OrderController::class, 'konfirmasi']);
Route::get('/history',  [OrderController::class, 'history'])->name('order.history');
Route::get('/history/{id}',  [OrderController::class, 'detailHistory'])->name('order.history.detail');
Route::get('/check_out', [PenggunaController::class, 'check_out']);



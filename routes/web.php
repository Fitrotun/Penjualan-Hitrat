<?php

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
use App\Models\Product;

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
// Route::get('/pesan', 'UserController@pesan');
// Route::get('/get-pesan', 'UserController@flus');
// Faq
Route::resource('/faq', FaqController::class);
// Product
Route::resource('/product', ProductController::class);
Route::post('/product', [ProductController::class, 'store'])->name('product');
Route::get('/product', [ProductController::class,'index'])->name('product.index');
Route::post('/product', [ProductController::class,'store'])->name('product.store');
Route::post('/product', [ProductController::class, 'store'])->name('product');
Route::get('/produk', [ProductController::class,'lindex']);
Route::get('/search',[ProductController::class, 'searchProduct'] );

// cart
Route::get('/detail_produk/{id}', [PenggunaController::class, 'dcart']);

// // transaksi
Route::post('/pesan/{id}', [PenggunaController::class, 'pesan']);
Route::get('/keranjang', [PenggunaController::class, 'keranjang']);
Route::get('/konfirmasi', [PenggunaController::class, 'konfirmasi']);
Route::get('/keranjang/{id}/delete', [PenggunaController::class, 'delete']);

// Route::group(['middleware' => ['auth','CekLevel:admin,user']], function() {
//     Route::get('/cart', [CartController::class, 'cart']);

//     // Pesanan
//     Route::post('/pesan/{id}', [TransactionController::class, 'pesan']);
//     Route::get('/keranjang', [TransactionController::class, 'keranjang']);
//     Route::get('/konfirmasi', [TransactionController::class, 'konfirmasi']);
//     Route::get('/keranjang/{id}/delete', [TransactionController::class, 'delete']);


//     // Route::get('profile', [TransactionController::class, 'pindex']);
//     // Route::post('profile', [TransactionController::class, 'update']);


//     // Route::get('history',  [HistoryController::class, 'index']);
//     // Route::get('history/{id}',  [HistoryController::class, 'detail']);
// });
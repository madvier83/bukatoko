<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Models\Product;
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

Route::get('/', [HomeController::class, 'index']);
// Route::get('/products', [HomeController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);

    Route::get('register', [RegisterController::class, 'index']);
    Route::post('register', [RegisterController::class, 'store']);
});
Route::post('logout', [LoginController::class, 'logout']);


Route::middleware('auth')->group(function () {
    Route::get('/akun', [HomeController::class, 'account']);
    Route::get('/pesanan', [HomeController::class, 'orders']);

    Route::get('/products/{product:id}', [HomeController::class, 'details']);
    Route::get('/produk', [HomeController::class, 'products']);
    
    Route::get('/toko', [ProductController::class, 'index']);
    Route::get('/toko/create', [ProductController::class, 'create']);
    Route::Post('/toko', [ProductController::class, 'store']);
    Route::get('/products/edit/{product:id}', [ProductController::class, 'edit']);
    Route::post('/products/update/{product:id}', [ProductController::class, 'update']);

    Route::resource('/transaksi', TransactionController::class);
});
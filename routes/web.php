<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminTransactionController;

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

Route::get('/products/{product:id}', [HomeController::class, 'details']);
Route::get('/products', [HomeController::class, 'products']);

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout']);

    // for user
    Route::get('/akun', [HomeController::class, 'account']);
    Route::get('/pesanan', [HomeController::class, 'orders']);

    Route::get('/toko', [ProductController::class, 'index']);
    Route::get('/toko/create', [ProductController::class, 'create']);
    Route::Post('/toko', [ProductController::class, 'store']);

    Route::get('/products/edit/{product:id}', [ProductController::class, 'edit']);
    Route::post('/products/update/{product:id}', [ProductController::class, 'update']);
    Route::post('/products/{product:id}', [ProductController::class, 'destroy']);

    Route::resource('/transaksi', TransactionController::class);

    Route::middleware('admin')->group(function () {
        // admin
        Route::get('/dashboard', [AdminController::class, 'index']);
        Route::resource('/dashboard/users', AdminUserController::class);
        Route::resource('/dashboard/categories', AdminCategoryController::class);
        Route::resource('/dashboard/products', AdminProductController::class);
        Route::resource('/dashboard/transactions', AdminTransactionController::class);
    });
});

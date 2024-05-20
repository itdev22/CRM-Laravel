<?php

use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SalesController;
use App\Http\Controllers\admin\TransactionController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [DashboardController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/loginpost', [AuthController::class, 'auth'])->name('loginpost');

Route::prefix('admin')->name('admin.')->middleware(['auth','admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::post('/', [ProductController::class, 'create'])->name('create');
        Route::post('/{id}/update', [ProductController::class, 'update'])->name('update');
        Route::post('/{id}/delete', [ProductController::class, 'delete'])->name('delete');
    });
    Route::prefix('transaction')->name('transaction.')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::post('/', [TransactionController::class, 'create'])->name('create');
        Route::get('/{id}/invoice', [TransactionController::class, 'invoice'])->name('invoice');
        Route::post('/{id}/delete', [TransactionController::class, 'delete'])->name('delete');
        Route::prefix('sale')->name('sale.')->group(function () {
            Route::get('/', [TransactionController::class, 'indexsale'])->name('index');
        });
    });
    Route::prefix('sales')->name('sales.')->group(function () {
        Route::get('/', [SalesController::class, 'index'])->name('index');
        Route::post('/', [SalesController::class, 'create'])->name('create');
        Route::post('/{id}/update', [SalesController::class, 'update'])->name('update');
        Route::post('/{id}/delete', [SalesController::class, 'delete'])->name('delete');
    });
    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::post('/', [CustomerController::class, 'create'])->name('create');
        Route::post('/{id}/update', [CustomerController::class, 'update'])->name('update');
        Route::post('/{id}/delete', [CustomerController::class, 'delete'])->name('delete');
    });
});

Route::prefix('sales')->name('sales.')->middleware(['auth','sales'])->group(function () {
    Route::get('/', function () {
        return view('sales.index');
    });
    Route::prefix('transaction')->name('transaction.')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::post('/', [TransactionController::class, 'create'])->name('create');
        Route::get('/report', [TransactionController::class, 'report'])->name('index');
        Route::get('/{id}/invoice', [TransactionController::class, 'invoice'])->name('invoice');
        Route::post('/{id}/delete', [TransactionController::class, 'delete'])->name('delete');
        Route::prefix('sale')->name('sale.')->group(function () {
            Route::get('/', [TransactionController::class, 'indexsale'])->name('index');
        });
    });
    Route::prefix('sales')->name('sales.')->group(function () {
        Route::get('/', [SalesController::class, 'index'])->name('index');
        Route::post('/', [SalesController::class, 'create'])->name('create');
        Route::post('/{id}/update', [SalesController::class, 'update'])->name('update');
        Route::post('/{id}/delete', [SalesController::class, 'delete'])->name('delete');
    });
    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::post('/', [CustomerController::class, 'create'])->name('create');
        Route::post('/{id}/update', [CustomerController::class, 'update'])->name('update');
        Route::post('/{id}/delete', [CustomerController::class, 'delete'])->name('delete');
    });
});

Route::prefix('customer')->group(function () {
    Route::get('/', function () {
        return view('customer.index');
    });
});

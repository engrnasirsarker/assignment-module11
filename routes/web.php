<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\MainController;

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




Route::get('/', [MainController::class, 'dashboard']);

// product route
Route::get('/products/index', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/products/delete/{id}', [ProductController::class, 'destroy']);


// Sale route
Route::get('/sale/index', [SaleController::class, 'index'])->name('sale.index');
Route::get('/sale/create', [SaleController::class, 'create'])->name('sale.create');
Route::post('/sale/store', [SaleController::class, 'store'])->name('sale.store');
Route::get('/sale/delete/{id}', [SaleController::class, 'destroy'])->name('sale.delete');
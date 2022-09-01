<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

# products
Route::get('/products/show', [ProductsController::class, 'show'])->name('products.show');
Route::post('/products/save', [ProductsController::class, 'save'])->name('products.save');
Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
Route::post('/products/update', [ProductsController::class, 'update'])->name('products.update');
Route::get('/products/delete/{id}', [ProductsController::class, 'delete'])->name('products.delete');

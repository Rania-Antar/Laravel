<?php

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
Route::resource('category',\App\Http\Controllers\CategoryController::class)->middleware('auth');
Route::resource('products',\App\Http\Controllers\ProductController::class);
Route::resource('userProduct',\App\Http\Controllers\UserProductController::class)->middleware('auth');

Route::get('/ajax-products', [App\Http\Controllers\ProductController::class, 'api']);
Route::get('/myproducts/delete/{product}', [App\Http\Controllers\HomeController::class, 'delete'])->name('userProduct.delete');

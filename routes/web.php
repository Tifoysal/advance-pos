<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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
    return view('admin.master');
});

Route::resource('users',UserController::class);

//product 
Route::get('/product',[ProductController::class,'productlist'])->name('product.list');
Route::get('/productcategory',[ProductController::class,'productcategory'])->name('product.category');
Route::post('/product.store',[ProductController::class,'store'])->name('product.store');





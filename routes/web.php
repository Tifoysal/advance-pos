<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;

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



Route::get('/role',[RolesController::class,'index'])->name('role.index');
Route::get('/role/create',[RolesController::class,'create'])->name('role.create');
Route::post('/role_store',[RolesController::class,'store_role'])->name('role.store');
Route::get('/role_view/{role_id}', [RolesController::class, 'details_role'])->name('role.view');
Route::get('/role_edit/{role_id}',[RolesController::class, 'edit_role'])->name('role.edit');
Route::post('/role_update/{role_id}',[RolesController::class, 'update_role'])->name('role.update');
Route::get('/role_delete/{role_id}',[RolesController::class, 'delete_role'])->name('delete.role');


// category
Route::get('/category_list',[CategoryController::class,'list_category'])->name('category.list');
Route::get('/category_add',[CategoryController::class,'add_category'])->name('category.add');
Route::post('/category_store',[CategoryController::class,'store_category'])->name('category.store');
Route::get('/category_view/{category_id}', [CategoryController::class, 'details_category'])->name('category.view');
Route::get('/category_edit/{category_id}',[CategoryController::class, 'edit_category'])->name('category.edit');
Route::post('/category_update/{category_id}',[CategoryController::class, 'update_category'])->name('category.update');
Route::get('/category_delete/{category_id}', [CategoryController::class, 'delete_category'])->name('delete.category');

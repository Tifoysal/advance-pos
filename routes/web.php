<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

//
////product
Route::get('/product',[ProductController::class,'productlist'])->name('product.list');
Route::get('/productcategory',[ProductController::class,'productcategory'])->name('product.category');
Route::post('/product.store',[ProductController::class,'store'])->name('product.store');
Route::get('/product_delete/{product_id}', [ProductController::class, 'deleteproduct'])->name('delete.product');
Route::get('/product_details/{product_id}', [ProductController::class,'productdetails'])->name('product.details');


// category
Route::get('/category_list',[CategoryController::class,'list_category'])->name('category.list');
Route::get('/category_add',[CategoryController::class,'add_category'])->name('category.add');
Route::post('/category_store',[CategoryController::class,'store_category'])->name('category.store');
Route::get('/category_view/{category_id}', [CategoryController::class, 'details_category'])->name('category.view');
Route::get('/category_edit/{category_id}',[CategoryController::class, 'edit_category'])->name('category.edit');
Route::post('/category_update/{category_id}',[CategoryController::class, 'update_category'])->name('category.update');
Route::get('/category_delete/{category_id}', [CategoryController::class, 'delete_category'])->name('delete.category');



Route::get('add/role',[RoleController::class,'create'])->name('add.role');
Route::get('list/role',[RoleController::class,'index'])->name('role.index');
Route::post('create/role',[RoleController::class,'store'])->name('create.role');
Route::get('edit/role/{role_id}',[RoleController::class,'edit'])->name('edit.role');
Route::post('update/role/{role_id}',[RoleController::class,'update'])->name('update.role');
Route::get('view/role/{role_id}',[RoleController::class,'show'])->name('view.role');


// permission
Route::get('/permissions',[PermissionController::class,'index'])->name('permission.index');
Route::get('/permission/create',[PermissionController::class,'create'])->name('permission.create');
Route::post('/permission/store',[PermissionController::class,'store'])->name('permission.store');

//assign permissions
Route::get('/permissions/assign/{role_id}',[RoleController::class,'assignForm'])->name('permission.assign.form');
Route::post('/permissions/assign/store',[RoleController::class,'assignStore'])->name('permission.assign.store');

Route::get('/role',[RolesController::class,'index'])->name('role.index');
Route::get('/role/create',[RolesController::class,'create'])->name('role.create');
Route::post('/role_store',[RolesController::class,'store_role'])->name('role.store');
Route::get('/role_view/{role_id}', [RolesController::class, 'details_role'])->name('role.view');
Route::get('/role_edit/{role_id}',[RolesController::class, 'edit_role'])->name('role.edit');
Route::post('/role_update/{role_id}',[RolesController::class, 'update_role'])->name('role.update');
Route::get('/role_delete/{role_id}',[RolesController::class, 'delete_role'])->name('delete.role');

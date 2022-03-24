<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Login\LoginController;

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


//user login
Route::get('/admin/login/form', [LoginController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/dologin', [LoginController::class, 'login'])->name('admin.doLogin');
Route::get('/admin/forget-password', [LoginController::class, 'forgetPassword'])->name('admin.forget.password');
Route::post('/admin/forget-password', [LoginController::class, 'forgetPasswordEmailPost'])->name('admin.forget.password.post');
Route::get('/admin/reset-password/{token}', [LoginController::class, 'resetPassword'])->name('admin.reset.password');
Route::post('/admin/reset-password/', [LoginController::class, 'resetPasswordPost'])->name('admin.reset.password.post');

Route::get('auth/facebook', [LoginController::class, 'facebookRedirect'])->name('login.facebook');
Route::get('auth/facebook/callback', [LoginController::class, 'loginWithFacebook']);


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('admin.master');
//    return redirect()->route('login.form');
    })->name('admin');

    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware'=>'checkPermission'],function (){

//user
    Route::resource('users', UserController::class);

    Route::get('/users-all-data', [UserController::class, 'allData'])->name('users.allData');

////product
    Route::get('/product', [ProductController::class, 'productlist'])->name('product.list');
    Route::get('/productcategory', [ProductController::class, 'productcategory'])->name('product.category');
    Route::post('/product.store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product_delete/{product_id}', [ProductController::class, 'deleteproduct'])->name('delete.product');
    Route::get('/product_details/{product_id}', [ProductController::class, 'productdetails'])->name('product.details');


// category
    Route::get('/category_list', [CategoryController::class, 'list_category'])->name('category.list');
    Route::get('/category_add', [CategoryController::class, 'add_category'])->name('category.add');
    Route::post('/category_store', [CategoryController::class, 'store_category'])->name('category.store');
    Route::get('/category_view/{category_id}', [CategoryController::class, 'details_category'])->name('category.view');
    Route::get('/category_edit/{category_id}', [CategoryController::class, 'edit_category'])->name('category.edit');
    Route::post('/category_update/{category_id}', [CategoryController::class, 'update_category'])->name('category.update');
    Route::get('/category_delete/{category_id}', [CategoryController::class, 'delete_category'])->name('delete.category');



    Route::get('role/list', [RoleController::class, 'index'])->name('role.list');
    Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('edit/role/{role_id}', [RoleController::class, 'edit'])->name('edit.role');
    Route::post('update/role/{role_id}', [RoleController::class, 'update'])->name('update.role');
    Route::get('view/role/{role_id}', [RoleController::class, 'show'])->name('view.role');


// permission
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/permission/store', [PermissionController::class, 'store'])->name('permission.store');

//assign permissions
    Route::get('/permissions/assign/{role_id}', [RoleController::class, 'assignForm'])->name('permission.assign.form');
    Route::post('/permissions/assign/store', [RoleController::class, 'assignStore'])->name('permission.assign.store');

    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;

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



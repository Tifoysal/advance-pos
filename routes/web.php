<?php
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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

Route::get('add/role',[RoleController::class,'create'])->name('add.role');
Route::get('list/role',[RoleController::class,'index'])->name('list.role');
Route::post('create/role',[RoleController::class,'store'])->name('create.role');
Route::get('edit/role/{role_id}',[RoleController::class,'edit'])->name('edit.role');
Route::post('update/role/{role_id}',[RoleController::class,'update'])->name('update.role');
Route::get('view/role/{role_id}',[RoleController::class,'show'])->name('view.role');


// category
Route::get('/category_list',[CategoryController::class,'list_category'])->name('category.list');
Route::get('/category_add',[CategoryController::class,'add_category'])->name('category.add');
Route::post('/category_store',[CategoryController::class,'store_category'])->name('category.store');
Route::get('/category_view/{category_id}', [CategoryController::class, 'details_category'])->name('category.view');
Route::get('/category_edit/{category_id}',[CategoryController::class, 'edit_category'])->name('category.edit');
Route::post('/category_update/{category_id}',[CategoryController::class, 'update_category'])->name('category.update');
Route::get('/category_delete/{category_id}', [CategoryController::class, 'delete_category'])->name('delete.category');
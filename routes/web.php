<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\BannerAdminController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminRolesController;

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

Route::get('/', 'AdminController@loginAdmin');
Route::post('/', 'AdminController@postLoginAdmin');
Route::get('logout', 'AdminController@logout');

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [AdminCategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [AdminCategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [AdminCategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/update/{id}', [AdminCategoryController::class, 'update'])->name('categories.update');
        Route::get('/delete/{id}', [AdminCategoryController::class, 'delete'])->name('categories.delete');
    });
    Route::prefix('menus')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('menus.index');
        Route::get('/create', [MenuController::class, 'create'])->name('menus.create');;
        Route::post('/store', [MenuController::class, 'store'])->name('menus.store');;
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('menus.edit');;;
        Route::post('/update/{id}', [MenuController::class, 'update'])->name('menus.update');
        Route::get('/delete/{id}', [MenuController::class, 'delete'])->name('menus.delete');
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('product.index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('product.create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [AdminProductController::class, 'edit'])->name('product.edit');
        Route::post('update/{id}', [AdminProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [AdminProductController::class, 'delete'])->name('product.delete');
    });
    Route::prefix('slider')->group(function () {
        Route::get('/', [BannerAdminController::class, 'index'])->name('banner.index');
        Route::get('/create', [BannerAdminController::class, 'create'])->name('banner.create');
        Route::post('/store', [BannerAdminController::class, 'store'])->name('banner.store');
        Route::get('/edit/{id}', [BannerAdminController::class, 'edit'])->name('banner.edit');
        Route::post('/update/{id}', [BannerAdminController::class, 'update'])->name('banner.update');
        Route::get('/delete/{id}', [BannerAdminController::class, 'delete'])->name('banner.delete');
    });
    Route::prefix('settings')->group(function () {
        Route::get('/', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::get('/create', [AdminSettingController::class, 'create'])->name('settings.create');
        Route::post('/store', [AdminSettingController::class, 'store'])->name('settings.store');
        Route::get('/edit/{id}', [AdminSettingController::class, 'edit'])->name('settings.edit');
        Route::post('/update/{id}', [AdminSettingController::class, 'update'])->name('settings.update');
        Route::get('/delete/{id}', [AdminSettingController::class, 'delete'])->name('settings.delete');

    });
    Route::prefix('users')->group(function () {
        Route::get('/', [AdminUsersController   ::class, 'index'])->name('users.index');
        Route::get('/create', [AdminUsersController::class, 'create'])->name('users.create');
        Route::post('/store', [AdminUsersController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [AdminUsersController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [AdminUsersController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [AdminUsersController::class, 'delete'])->name('users.delete');
    });
    Route::prefix('roles')->group(function () {
        Route::get('/', [AdminRolesController::class, 'index'])->name('roles.index');
        Route::get('/create', [AdminRolesController::class, 'create'])->name('roles.create');
        Route::post('/store', [AdminRolesController::class, 'store'])->name('roles.store');
        Route::get('/edit/{id}', [AdminRolesController::class, 'edit'])->name('roles.edit');
        Route::post('/update/{id}', [AdminRolesController::class, 'update'])->name('roles.update');
        Route::get('/delete/{id}', [AdminRolesController::class, 'delete'])->name('roles.delete');
    });
    Route::prefix('permissions')->group(function () {
        Route::get('/create', [AdminPermissionController::class, 'createPermission'])->name('permissions.create');
        Route::post('/store', [AdminPermissionController::class, 'store'])->name('permissions.store');

    });
    Route::get('ckeditor', 'AdminProductController@ckeditor');

});


<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\Admin\UploadController;


Route::get('admin/users/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);
//middleware :kiểm tra đăng nhập

Route::middleware(['auth'])->group(function (){
    Route::prefix('admin')->group(function (){
        //admin/
        Route::get('',[MainController::class,'index'])->name('admin');
        //admin/main
        Route::get('/main',[MainController::class,'index']);
        //admin/menus
        Route::prefix('/menus')->group(function () {
        //admin/menus/add
            Route::get('add',[MenuController::class,'create']);
            //admin/menus/add(store)
            Route::post('add',[MenuController::class,'store']);
            //admin/menus/list
            Route::get('list',[MenuController::class,'index']);
            //admin/menus/edit
            Route::get('edit/{menu}',[MenuController::class,'show']);
            //admin/menus/edit(update)
            Route::post('edit/{menu}',[MenuController::class,'update']);
            //admin/menus/list/DELETE
            Route::DELETE('destroy',[MenuController::class,'destroy']);

        });
//        Products
        Route::prefix('/products')->group(function () {
            //admin/products/add
            Route::get('add',[ProductController::class,'create']);
            //admin/products/add(store)
            Route::post('add',[ProductController::class,'store']);
            //admin/products/list
            Route::get('list',[ProductController::class,'index']);
            //admin/products/edit
            Route::get('edit/{menu}',[ProductController::class,'show']);
            //admin/products/edit(update)
            Route::post('edit/{menu}',[ProductController::class,'update']);
            //admin/products/list/DELETE
            Route::DELETE('destroy',[ProductController::class,'destroy']);

        });
        #Upload
        // admin/upload/services
        Route::post('/upload/services', [UploadController::class,'store']);

    });

});


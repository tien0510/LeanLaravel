<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\Admin\UploadController;
use \App\Http\Controllers\Admin\SliderController;



Route::get('admin/users/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);
//middleware :kiểm tra đăng nhập

Route::middleware(['auth'])->group(function (){
    Route::prefix('admin')->group(function (){
        //admin/
        Route::get('',[MenuController::class,'index']);
//        //admin/main
//        Route::get('/main',[MainController::class,'index']);

        //admin/menus
        Route::prefix('/menus')->group(function () {
        //admin/menus/add
            Route::get('add',[MenuController::class,'create']);
            //admin/menus/add(store)
            Route::post('add',[MenuController::class,'store']);
            //admin/menus/list
            Route::get('list',[MenuController::class,'index'])->name('admin');
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
            Route::get('edit/{product}',[ProductController::class,'show']);
            //admin/products/edit(update)
            Route::post('edit/{product}',[ProductController::class,'update']);
            //admin/products/list/DELETE
            Route::DELETE('destroy',[ProductController::class,'destroy']);
            //admin/products/check(slug)
            Route::post('check',[ProductController::class,'slug']);


        });
        Route::prefix('/sliders')->group(function () {
            //admin/sliders/add
            Route::get('add',[SliderController::class,'create']);
            //admin/sliders/add(store)
            Route::post('add',[SliderController::class,'store']);
            //admin/sliders/list
            Route::get('list',[SliderController::class,'index']);
            //admin/sliders/edit
            Route::get('edit/{slider}',[SliderController::class,'show']);
            //admin/sliders/edit(update)
            Route::post('edit/{slider}',[SliderController::class,'update']);
            //admin/sliders/list/DELETE
            Route::DELETE('destroy',[SliderController::class,'destroy']);
        });
        #Upload
        // admin/upload/services
        Route::post('/upload/services', [UploadController::class,'store']);

    });

});
//Guest
Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->middleware('cacheResponse:6');


Route::post('/services/load-product',[\App\Http\Controllers\MainController::class,'loadProduct']);

Route::get('/danh-muc/{id}/{slug}.html', [\App\Http\Controllers\MenuController::class, 'index']);
Route::get('/san-pham/{id}/{slug}.html', [\App\Http\Controllers\ProductController::class, 'index']);
Route::post('/add-cart', [CartController::class, 'index']);
Route::get('/carts', [CartController::class, 'show']);
Route::post('/update-cart', [CartController::class, 'update']);
Route::DELETE('/carts/delete',[CartController::class,'destroy']);





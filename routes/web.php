<?php

use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\CategoriesController\CategoriesController;
use App\Http\Controllers\NewsController\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function(){
   Route::get('/', AdminIndexController::class)->name('home');
   Route::resource('/news', AdminNewsController::class);
   Route::resource('/category', AdminCategoryController::class);
   Route::resource('/orders', AdminOrderController::class);
});

//User routes
Route::get('/', [NewsController::class, 'index'])->name('home');

Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/news/{id}', [NewsController::class, 'show']);

Route::get('/category/{category_id}/news', [NewsController::class, 'showByCategory']);
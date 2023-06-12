<?php

use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController;
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
   Route::get('/', IndexController::class)->name('home');
   Route::resource('/news', AdminNewsController::class);
   Route::resource('/category', AdminCategoryController::class);
});

//User routes
Route::get('/', [NewsController::class, 'index'])->name('home');

Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::get('/news/{id}', [NewsController::class, 'show']);

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');

Route::get('/news/category/{category_id}', [NewsController::class, 'showByCategory']);
<?php

use App\Http\Controllers\CategoriesController\CategoriesController;
use App\Http\Controllers\HomeController\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/news', [NewsController::class, 'index']);

Route::get('/news/{id}', [NewsController::class, 'show']);

Route::get('/categories', [CategoriesController::class, 'index']);

Route::get('/news/category/{category_id}', [NewsController::class, 'showByCategory']);
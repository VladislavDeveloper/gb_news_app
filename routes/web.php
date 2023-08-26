<?php

use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\ResourceController as AdminResourcesController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\NewsController\NewsController;
use App\Http\Controllers\ProfileController\ProfileController;
use App\Http\Controllers\SocialProvidersController;
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
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'isAdmin'], static function(){
   Route::get('/', AdminIndexController::class)->name('home');
   Route::resource('/news', AdminNewsController::class);
   Route::resource('/category', AdminCategoryController::class);
   Route::resource('/orders', AdminOrderController::class);
   Route::resource('/users', AdminUserController::class);
   Route::delete('/category/destroy/{id}', [AdminCategoryController::class, 'destroy'])->name('destroy-category');
   Route::get('/parse', ParserController::class)->name('parse');
   Route::resource('/resources', AdminResourcesController::class);
});


//Socialite authentication routes

Route::group(['middleware' => 'guest'], function () {
   Route::get('/{driver}/redirect', [SocialProvidersController::class, 'redirect'])->name('social-providers-redirect');
   Route::get('/{driver}/callback', [SocialProvidersController::class, 'callback'])->name('social-providers-callback');
});

//Authenticated user's routes
Route::group(['middleware' => 'auth'], function () {
   Route::get('/profile', [ProfileController::class, 'index'])->name('profile.show');
});

//User routes
Route::get('/', [NewsController::class, 'index'])->name('home');

Route::get('/news', [NewsController::class, 'index'])->name('news');

Route::resource('/news', NewsController::class);

Route::get('/category/{category_id}/news', [NewsController::class, 'showByCategory']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
   \UniSharp\LaravelFilemanager\Lfm::routes();
});
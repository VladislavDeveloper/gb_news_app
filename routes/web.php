<?php

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

$news = [
    [
        'id' => 1,
        'title' => 'Получено первое рентгеновское изображение отдельного атома'
    ],
    [
        'id' => 2,
        'title' => 'BI.ZONE: мошенники похитили более 560 доменов и превратили их в фишинговые сайты'
    ],
    [
        'id' => 3,
        'title' => 'РЖД представила собственного виртуального помощника «Валера»'
    ],
    [
        'id' => 4,
        'title' => '«МегаФон» и Банки.ру представят совместный проект'
    ]
];

$username = 'Пользователь';


Route::get('/', function () use ($username) {
    return view('home')->with('username', $username);
});

Route::get('/news', function () use ($news) {
    return view('news')->with('news', $news);
});

Route::get('/about', function () {
    return view('about');
});

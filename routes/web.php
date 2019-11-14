<?php

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
    return view('book.index');
});
Route::get('/index', function () {
    return view('book.index');
});
Route::get('/show', function () {
    return view('book.show');
});
Route::get('/mypage', function () {
    return view('book.mypage');
});

Route::get('book', ['as' => 'book.index', 'uses' => 'bookController@index']);
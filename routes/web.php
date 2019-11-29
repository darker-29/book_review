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

use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('login');
});
Route::get('/index', function () {
    return view('book.index');
});


Route::get('/login/github', 'Auth\LoginController@redirectToProvider');
Route::get('/login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('review', 'BookController@index')->name('book.index');
Route::get('review/selsct', 'BookController@firstSelectBook')->name('book.select');
Route::get('review/{isbn}/show', 'BookController@reviewList')->name('book.show');
Route::get('review/mypage', 'BookController@mypage')->name('book.mypage');
Route::get('review/user', 'BookController@userList')->name('book.user');
Route::post('review/create', 'BookController@reviewCreate')->name('book.create');
Route::put('review/{id}/edit', 'BookController@reviewEdit')->name('book.edit');
Route::put('review/{id}/destroy', 'BookController@destroy')->name('book.destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

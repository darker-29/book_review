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

// Route::get('/', function () {
//     return view('book.index');
// });
// Route::get('/index', function () {
//     return view('book.index');
// });
// Route::get('/show', function () {
//     return view('book.show');
// });
// Route::get('/mypage', function () {
//     return view('book.mypage');
// });
// Route::get('/user', function () {
//     return view('book.user');
// });

Route::get('review', 'BookReviewController@index')->name('book.index');
Route::get('review/show/{isbn}', 'BookReviewController@bookReviewList')->name('book.show');
Route::get('review/{user_id}/mypage', 'BookReviewController@myBookReviewHistory')->name('book.mypage');
Route::get('review/user', 'BookReviewController@userList')->name('book.user');
Route::post('review/create', 'BookReviewController@bookReviewCreate')->name('book.create');
Route::put('review/{id}/edit', 'BookReviewController@bookReviewEdit')->name('book.edit');
Route::put('review/{id}/destroy', 'BookReviewController@destroy')->name('book.destroy');

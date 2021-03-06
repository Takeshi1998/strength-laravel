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

Route::view('/', 'welcome');

Auth::routes();

Route::get('/logout', 'AuthenticationController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/person','PersonController@index')->name('person');
// ツイート
Route::get('/tweet','TweetController@index')->name('tweet');
Route::post('/tweet/post','TweetController@post')->name('tweet.post');
// 編集・消去
Route::get('/delete','DeleteController@delete');
Route::get('/update','UpdateController@Update');
Route::post('/update/tweet','UpdateController@UpdateTweet');
Route::get('/study','StudyController@index');

Route::view('/calender', 'str.calender');

Route::get('/comment/{id}/likedcheck','LikeController@check')->name('Like.check');
Route::get('/comment/{id}/like','LikeController@index')->name('Like.index');
Route::get('/comment/{id}/unlike','LikeController@delete')->name('Like.delete');

Route::view('/strength/qr','strength.qr')->name('line.str');

Route::resource('/order','OrderController')->names('orders');







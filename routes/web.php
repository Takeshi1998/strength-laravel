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
    return view('welcome');
});

Route::get('log',function(){
    return view('str.login');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/person','PersonController@index');
// ツイート
Route::get('/tweet','TweetController@index');
Route::post('/tweet/post','TweetController@post');
// 編集・消去
Route::get('/delete','DeleteController@delete');
Route::get('/update','UpdateController@Update');
Route::post('/update/tweet','UpdateController@UpdateTweet');

Route::get('/calender',function(){
    return view('str.calender');
});
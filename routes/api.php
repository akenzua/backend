<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/devotional/{lang}', 'DevotionalsController@index');

Route::get('/metadata/{lang}/{date}', 'DevotionalsController@show')->middleware('auth.jwt');
Route::get('/paragraphs/{lang}/{date}', 'DevotionalsController@show')->middleware('auth.jwt');
Route::get('/bibleplan/{lang}/{date}', 'BibleReadingController@show');
Route::get('/chapter', 'BibleReadingController@chapter');
Route::get('/versions/{lang}', 'BibleReadingController@versions');
Route::get('/books/{version}', 'BibleReadingController@books');
Route::get('/opening/{opening}', 'BibleReadingController@opening');
Route::get('/chapter/{chapter}', 'BibleReadingController@chapter');
Route::get('/further/{further}', 'BibleReadingController@further');

Route::get('/details/{details}', 'BibleReadingController@chapterDetails');
Route::get('/twoyear/{lang}/{date}', 'BibleReadingController@show');

Route::get('/profile', 'UserController@profile');

Route::post('/user', 'UserController@signup');

Route::post('/user/signin', 'UserController@signin');
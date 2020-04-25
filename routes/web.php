<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('comments/list','CommentController@allItems')->name('comments.list');
Route::post('comments/store/{id}', 'CommentController@store')->name('comments-store');
Route::resource('comments', 'CommentController');


Route::resource('posts', 'PostController');

Route::resource('users', 'UserController');

Route::get('/home', 'HomeController@index')->name('home');

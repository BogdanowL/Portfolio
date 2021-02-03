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
//Route::get('/', function (){
//    return view('welcome');
//});

Auth::routes();

Route::get('/profile', 'ProfileController@index')->middleware('auth')->name('profile');

Route::get('/profile/{id}', 'ProfileController@show')->name('show.profile');

Route::get('/checkauth', 'ProfileController@checkAuth')->name('checkAuth');

Route::post('/send', 'MessageController@sendTelegram')->name('sendTelegram');

Route::group([ 'middleware' => 'auth'], function (){

    Route::get('/profile/edit/{id}', 'ProfileController@edit')->name('edit.profile');
    Route::post('/profile/edit/{id}', 'ProfileController@updateUser')->name('update.profile');
    Route::post('/profile/uploadAvatar', 'ProfileController@uploadUserAvatar')->name('upload.avatar');
    Route::post('/profile/album/upload', 'AlbumController@store')->name('store.image');
    Route::post('/profile/status', 'ProfileController@changeStatus')->name('change.status');
    Route::post('/profile/post/create', 'PostController@store')->name('store.post');
    Route::get('/profile/post/edit/{id}', 'PostController@edit')->name('edit.post');
    Route::post('/profile/post/update/{id}', 'PostController@updatePost')->name('update.post');
    Route::delete('/profile/post/delete/{id}', 'PostController@destroy')->name('destroy.post');

    #Message
    Route::get('/dialogs', 'MessageController@index')->name('dialog.index');
    Route::get('/dialog/{id}', 'MessageController@show')->name('dialog.show');
    Route::post('/dialog/{id}', 'MessageController@store')->name('dialog.store');
});
Route::get('/', 'HomeController@index')->name('home');

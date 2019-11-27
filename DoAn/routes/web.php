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
    return view('layouts.mainPage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/','AdminController@index');
    Route::get('/users','AdminController@index');
    Route::get('/users/getInfoAUser','AdminController@getInfoAUser');
    Route::post('/users/edit','AdminController@editUser');
    Route::post('/users/add','AdminController@addUser');

//    Route::get('/owner','AdminController@index');
    Route::get('/pitch','AdminController@indexPitch');
    Route::get('/pitch/{id}','AdminController@subPitch');

});

Route::prefix('users')->group(function (){
    Route::get('/', 'UserController@index');
});


Route::prefix('owner')->group(function (){
    Route::get('/','OwnerController@index');
    Route::get('/pitch','OwnerController@pitchInfo');
    Route::get('/pitch/{id}','OwnerController@subPitchInfo');
});

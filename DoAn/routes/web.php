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
//    Admin manage User Controller
    Route::get('/','AdminController@index')->name('adminDashboard');
    Route::get('/users','Admin\UserController@index')->name('getAllUser');
    Route::get('/users/getInfoAUser','Admin\UserController@getInfoAUser')->name('getInfoAUser');
    Route::post('/users/edit','Admin\UserController@edit')->name('EditUser');
    Route::post('/users/add','Admin\UserController@store')->name('StoreUser');

//    Admin manage Pitch Controller
    Route::get('/pitch','Admin\PitchController@index')->name('pitch');
    Route::get('/pitch/{id}','Admin\SubPitchController@index')->name('subPitch');
    Route::post('pitch/store', 'Admin\PitchController@store')->name('storePitch');
});

Route::prefix('users')->group(function (){
    Route::get('/', 'User\UserController@index')->name('userDashboard');
    Route::post('/', 'User\UserController@update')->name('updateInfo');
    Route::get('/order', 'User\UserController@UserOrder')->name('UserOrder');
    Route::get('/history', 'User\UserController@HistoryOrder')->name('HistoryOrder');
});

Route::prefix('owner')->group(function (){
//    Owner manage user information
    Route::get('/','OwnerController@index')->name('ownerDashboard');
//    Owner manage Pitch Controller
    Route::get('/pitch','Owner\PitchController@index')->name('OwnerPitch');
    Route::post('/pitch/add','Owner\PitchController@store')->name('StorePitch');
//    Owner manage SubPitch Controller
    Route::get('/pitch/{id}','Owner\SubPitchController@index');
    Route::post('pitch/addPrice', 'Owner\SubPitchController@storePrice')->name('StorePrice');
    Route::post('pitch/addSubPitch', 'Owner\SubPitchController@StoreSubPitch')->name('StoreSubPitch');
    Route::delete('pitch/deletePrice','Owner\SubPitchController@deletePrice')->name('deletePrice');
    Route::delete('pitch/deleteSubPitch','Owner\SubPitchController@deleteSubpitch')->name('deleteSubPitch');
//Owner manage Order
    Route::get('order', 'Owner\OrderController@index')->name('OwnerOrder');
});

Route::post('/search', 'SearchController@index')->name('Search');
Route::get('/search/{id}', 'SearchController@SearchSubPitch')->name('SearchSubPitch');
Route::post('/search/searchfreetime', 'SearchController@SearchFreeTime')->name('SearchFreeTime');
Route::post('search/order','SearchController@Order')->name('Order');
//Route::get('/search', 'SearchController@index')->name('Search');

//Route::get('/validate', function () {
//    return view('Admin.component.validate');
//});

Route::get('/abc',function (){
    return view('User.test');
});

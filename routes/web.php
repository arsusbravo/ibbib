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

Route::group(['prefix' => 'admin',  'middleware' => ['master', 'admin', 'worker']], function() {
    Route::get('/',                                     'AdminController@index');
});
Route::group(['prefix' => 'user',  'middleware' => ['crew']], function() {
    Route::post('/account',                             'CrewController@update');

    Route::get('/',                                     'CrewController@index');
    Route::get('/account',                              'CrewController@account');
    Route::get('/project/{id}',                         'CrewController@project');
});
Route::group(['prefix' => 'client',  'middleware' => ['customer']], function() {
    Route::post('/account',                             'CustomerController@update');
    Route::post('/project',                             'CustomerController@projectStore');

    Route::get('/',                                     'CustomerController@index');
    Route::get('/account',                              'CustomerController@account');
    Route::get('/project/{id}',                         'CustomerController@project');
    Route::get('/translators',                          'CustomerController@users');
    Route::get('/translator/{id}',                      'CustomerController@user');
});

Route::get('/',                                         'HomeController@index');
Auth::routes();
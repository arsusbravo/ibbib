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

    Route::get('/',                                     'ProjectController@index');
    Route::get('/account',                              'CrewController@index');
    
    Route::get('/project/{id}',                         'ProjectController@show');
});
Route::group(['prefix' => 'client',  'middleware' => ['customer']], function() {
    Route::post('/account',                             'CustomerController@update');
    Route::post('/project',                             'ProjectController@store');
    Route::post('/project/{id}',                        'ProjectController@update');

    Route::get('/',                                     'ProjectController@create');
    Route::get('/account',                              'CustomerController@index');
    Route::get('/project-edit/{id}',                    'ProjectController@edit');
    Route::get('/project-publication/{id}',             'ProjectController@publish');
    Route::get('/project/{id}',                         'ProjectController@show');
    Route::get('/translators',                          'CustomerController@users');
    Route::get('/translator/{id}',                      'CustomerController@user');
});

Route::get('/',                                         'HomeController@index');
Auth::routes();
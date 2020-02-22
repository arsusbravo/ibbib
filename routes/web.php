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
    Route::post('country',                              'CountryController@store');
    Route::post('country/{id}',                         'CountryController@update');
    Route::get('country/{id}',                          'CountryController@edit');
    Route::get('country',                               'CountryController@create');
    Route::get('countries',                             'CountryController@index');

    Route::post('language',                             'LanguageController@store');
    Route::post('language/{id}',                        'LanguageController@update');
    Route::get('language/{id}',                         'LanguageController@edit');
    Route::get('language',                              'LanguageController@create');
    Route::get('languages',                             'LanguageController@index');

    Route::post('content',                              'ContentController@store');
    Route::post('content/{id}',                         'ContentController@update');
    Route::get('content/{id}',                          'ContentController@edit');
    Route::get('content',                               'ContentController@create');
    Route::get('contents',                              'ContentController@index');

    Route::post('category',                             'CategoryController@store');
    Route::post('category/{id}',                        'CategoryController@update');
    Route::get('category/{id}',                         'CategoryController@edit');
    Route::get('category',                              'CategoryController@create');
    Route::get('categories',                            'CategoryController@index');

    Route::post('role',                                 'RoleController@store');
    Route::post('role/{id}',                            'RoleController@update');
    Route::get('role/{id}',                             'RoleController@edit');
    Route::get('role',                                  'RoleController@create');
    Route::get('roles',                                 'RoleController@index');

    Route::post('message',                              'AdminMessageController@store');
    Route::post('message/{id}',                         'AdminMessageController@update');
    Route::get('message/{id}',                          'AdminMessageController@edit');
    Route::get('message',                               'AdminMessageController@create');
    Route::get('messages',                              'AdminMessageController@index');

    Route::post('skill',                                'SkillController@store');
    Route::post('skill/{id}',                           'SkillController@update');
    Route::get('skill/{id}',                            'SkillController@edit');
    Route::get('skill',                                 'SkillController@create');
    Route::get('skills',                                'SkillController@index');

    Route::post('price',                                'PriceController@store');
    Route::post('price/{id}',                           'PriceController@update');
    Route::get('price/{id}',                            'PriceController@edit');
    Route::get('price',                                 'PriceController@create');
    Route::get('prices',                                'PriceController@index');


    Route::post('project',                              'ProjectController@store');
    Route::post('project/{id}',                         'ProjectController@update');
    Route::get('project/{id}',                          'ProjectController@edit');
    Route::get('project',                               'ProjectController@create');
    Route::get('projects',                              'AdminController@projects');

    Route::get('role/users/{slug}',                     'AdminController@users');
    Route::post('user',                                 'UserController@store');
    Route::post('user/{id}',                            'UserController@update');
    Route::get('user/{id}',                             'UserController@edit');
    Route::get('user',                                  'UserController@create');
    Route::get('users',                                 'UserController@index');
    
    Route::get('/',                                     'AdminController@index');
});
Route::group(['prefix' => 'user',  'middleware' => ['crew']], function() {
    Route::post('/account',                             'CrewController@update');

    Route::get('/',                                     'ProjectController@index');
    Route::get('/pricing',                              'CrewController@pricing');
    Route::get('/account',                              'CrewController@index');
    
    Route::get('/project/{id}',                         'ProjectController@show');
    Route::get('/apply/{id}',                           'ProjectController@apply');
    Route::get('/bookmark/{id}',                        'ProjectController@bookmark');
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
    Route::get('/pricing',                              'CustomerController@pricing');
    Route::get('/recruit/{id}',                         'CustomerController@recruiting');
    Route::get('/translators',                          'CustomerController@read');
    Route::get('/translator/{id}',                      'CustomerController@show');
});

Route::get('terms-conditions',                          'HomeController@termsconditions');
Route::get('translator',                                'HomeController@translator');
Route::get('contact',                                   'HomeController@contact');
Route::get('agency',                                    'HomeController@agency');
Route::get('about',                                     'HomeController@about');
Route::get('/',                                         'HomeController@index');
Auth::routes();
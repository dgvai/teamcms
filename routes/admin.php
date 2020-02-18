<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/users', 'Admin\UserController@showUserManagement')->name('admin.users');
    Route::get('/designations', 'Admin\DesignationController@showIndex')->name('admin.designations');

    Route::post('/user/get', 'Admin\UserController@getUser')->name('user.get');
    Route::post('/user/approve', 'Admin\UserController@approveUser')->name('user.approve');
    Route::post('/user/reject', 'Admin\UserController@rejectUser')->name('user.reject');
    Route::post('/user/delete', 'Admin\UserController@deleteUser')->name('user.delete');

    Route::post('/designation/new', 'Admin\DesignationController@addNew')->name('new.designation');
    Route::get('/designation/data', 'Admin\DesignationController@getDesignationData')->name('get.designations');
    Route::post('/designation/up', 'Admin\DesignationController@uprank')->name('uprank');
    Route::post('/designation/down', 'Admin\DesignationController@downrank')->name('downrank');
    Route::post('/designation/deactive', 'Admin\DesignationController@deactivateRank')->name('deactive');
    Route::post('/designation/active', 'Admin\DesignationController@activateRank')->name('active');



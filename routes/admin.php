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
    Route::get('/events/create', 'Admin\EventsController@create')->name('admin.events.create');
    Route::get('/events/manage', 'Admin\EventsController@manage')->name('admin.events.manage');

    Route::post('/user/get', 'Admin\UserController@getUser')->name('user.get');
    Route::post('/user/approve', 'Admin\UserController@approveUser')->name('user.approve');
    Route::post('/user/reject', 'Admin\UserController@rejectUser')->name('user.reject');
    Route::post('/user/delete', 'Admin\UserController@deleteUser')->name('user.delete');
    Route::post('/user/assign', 'Admin\UserController@assignUser')->name('user.assign');
    Route::post('/user/promote', 'Admin\UserController@promoteUser')->name('user.promote');
    Route::post('/user/manage', 'Admin\UserController@manageUser')->name('user.manage');
    Route::post('/user/move', 'Admin\UserController@moveAlumniUser')->name('user.move');
    Route::post('/user/moveback', 'Admin\UserController@movebackAlumniUser')->name('user.moveback');
    Route::post('/user/delete', 'Admin\UserController@deleteAlumniUser')->name('user.delete');

    Route::post('/designation/new', 'Admin\DesignationController@addNew')->name('new.designation');
    Route::post('/designation/general', 'Admin\DesignationController@assignGeneral')->name('general.assign');
    Route::get('/designation/data', 'Admin\DesignationController@getDesignationData')->name('get.designations');
    Route::post('/designation/up', 'Admin\DesignationController@uprank')->name('uprank');
    Route::post('/designation/down', 'Admin\DesignationController@downrank')->name('downrank');
    Route::post('/designation/deactive', 'Admin\DesignationController@deactivateRank')->name('deactive');
    Route::post('/designation/active', 'Admin\DesignationController@activateRank')->name('active');



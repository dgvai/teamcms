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
    Route::get('/blogs/manage', 'Admin\BlogsController@manage')->name('admin.blogs.manage');
    Route::get('/profile/manage', 'Admin\ProfileController@manage')->name('admin.profile.manage');

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

    Route::post('/events/create', 'Admin\EventsController@createEvent')->name('events.create');
    Route::post('/event', 'Admin\EventsController@getEvent')->name('event.get');
    Route::post('/event/delete', 'Admin\EventsController@deleteEvent')->name('event.delete');
    Route::post('/events/edit/info', 'Admin\EventsController@editEventInfo')->name('events.edit.info');
    Route::post('/events/edit/link/add', 'Admin\EventsController@addEventlink')->name('events.edit.link.add');
    Route::post('/events/edit/link/remove', 'Admin\EventsController@removeEventlink')->name('events.edit.link.remove');
    Route::post('/events/edit/details', 'Admin\EventsController@editEventdetails')->name('events.edit.details');
    Route::post('/events/postevent/add', 'Admin\EventsController@addPostEvent')->name('events.add.postevent');
    Route::post('/events/postevent/get', 'Admin\EventsController@getPostEvent')->name('events.edit.get');
    Route::post('/events/postevent/edit', 'Admin\EventsController@editPostEvent')->name('events.edit.postevent');
    Route::post('/events/postevent/del/img', 'Admin\EventsController@delImgPostEvent')->name('events.pe.img.remove');

    Route::post('/blogs/view/signed','Admin\BlogsController@viewSigned')->name('blogs.view.signed');
    Route::post('/blogs/approve','Admin\BlogsController@approve')->name('blogs.approve');
    Route::post('/blogs/reject','Admin\BlogsController@reject')->name('blogs.reject');
    Route::post('/blogs/delete','Admin\BlogsController@delete')->name('blogs.delete');
    Route::post('/blogs/seo/update','Admin\BlogsController@updateSeo')->name('blogs.update.seo');
    Route::get('/blogs/seo/get','Admin\BlogsController@getSeo')->name('blogs.get.seo');

    Route::post('/profile/extra/add','Admin\ProfileController@addExtra')->name('profile.extra.add');
    Route::post('/profile/extra/delete','Admin\ProfileController@deleteExtra')->name('profile.extra.delete');
    Route::post('/profile/link/add','Admin\ProfileController@addlink')->name('profile.link.add');
    Route::post('/profile/link/delete','Admin\ProfileController@deleteLink')->name('profile.link.delete');



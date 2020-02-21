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



Auth::routes();

Route::get('/', 'Site\HomeController@index')->name('home');
Route::get('/about', 'Site\HomeController@about')->name('about');
Route::get('/committee', 'Site\MemberController@showCommittee')->name('members.committee');
Route::get('/members', 'Site\MemberController@showMembers')->name('members.current');
Route::get('/alumnis', 'Site\MemberController@showAlumnis')->name('members.alumni');
Route::get('/member/{rollid}', 'Site\ProfileController@showProfile')->name('member.profile');
Route::get('/events','Site\EventsController@showEvents')->name('events');
Route::get('/event/{slug}','Site\EventsController@showEvent')->name('event.show');
Route::get('/blogs','Site\BlogsController@showBlogs')->name('blogs');
Route::get('/blogs/new','Site\BlogsController@newBlog')->name('blog.new');
Route::get('/blog/{slug}','Site\BlogsController@showBlog')->name('blog.show');
Route::get('/blog/{slug}/edit','Site\BlogsController@editBlog')->name('blog.edit');
Route::get('/blog/{slug}/delete','Site\BlogsController@deleteBlog')->name('blog.delete');

Route::post('/blogs/new','Site\BlogsController@newBlogPost')->name('blog.new.post');

Route::get('/profile',function(){
    return view('frontend.profile');
});
Route::get('/profile/edit',function(){
    return view('frontend.edit-profile');
});
Route::get('/profile/add',function(){
    return view('frontend.add-portfolio');
});
Route::get('/profile/settings',function(){
    return view('frontend.user-settings');
});

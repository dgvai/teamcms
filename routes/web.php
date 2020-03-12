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
Route::get('/events','Site\EventsController@showEvents')->name('events');
Route::get('/event/{slug}','Site\EventsController@showEvent')->name('event.show');
Route::get('/blogs','Site\BlogsController@showBlogs')->name('blogs');
Route::get('/blogs/new','Site\BlogsController@newBlog')->name('blog.new');
Route::get('/blog/{slug}','Site\BlogsController@showBlog')->name('blog.show');
Route::get('/blog/unapproved/{id}','Site\BlogsController@showUnapprovedBlog')->name('blog.show.unapproved');
Route::get('/blog/{slug}/edit','Site\BlogsController@editBlog')->name('blog.edit');
Route::get('/member/{roll_id}','Site\ProfileController@profile')->name('user.profile');
Route::get('/member/{roll_id}/edit','Site\ProfileController@edit_profile')->name('user.profile.edit');
Route::get('/member/add/portfolio','Site\ProfileController@showAddPortfolio')->name('user.profile.add.portfolio');
Route::get('/member/edit/portfolio/{id}','Site\ProfileController@showEditPortfolio')->name('user.profile.edit.portfolio');

Route::post('/blogs/new','Site\BlogsController@newBlogPost')->name('blog.new.post');
Route::get('/blogs/get/body','Site\BlogsController@getBody')->name('blog.get.body');
Route::post('/blogs/update','Site\BlogsController@updateBlogPost')->name('blog.update.post');
Route::post('/blog/delete','Site\BlogsController@deleteBlog')->name('blog.delete');
Route::post('/member/edit/basic','Site\ProfileController@editBasic')->name('user.profile.edit.basic');
Route::post('/member/edit/extra','Site\ProfileController@editExtra')->name('user.profile.edit.extra');
Route::post('/member/edit/dp','Site\ProfileController@editDP')->name('user.profile.edit.dp');
Route::post('/member/edit/socials','Site\ProfileController@editSocials')->name('user.profile.edit.socials');
Route::post('/member/add/portfolio','Site\ProfileController@addPortfolio')->name('user.profile.add.portfolio.add');
Route::post('/member/edit/portfolio','Site\ProfileController@editPortfolio')->name('user.profile.edit.portfolio.edit');
Route::post('/member/delete/portfolio','Site\ProfileController@deletePortfolio')->name('user.profile.delete.portfolio');

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

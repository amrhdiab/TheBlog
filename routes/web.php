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

//Front End Routes
Route::get('/','FrontEndController@index')->name('home');
Route::get('/about','FrontEndController@aboutUs')->name('about');
Route::get('/contact','FrontEndController@contactUs')->name('contact');
Route::get('/post/{slug}','FrontEndController@show')->name('single.post');
Route::get('/category/{category}/posts','FrontEndController@categoryPosts')->name('category.posts');
Route::get('/tag/{tag}/posts','FrontEndController@tagPosts')->name('tag.posts');
Route::get('/categories','FrontEndController@allCategories')->name('categories');
Route::get('/results','FrontEndController@search')->name('search');
Route::post('/newsletter','FrontEndController@newsletter')->name('newsletter');
Route::post('/contact/send_message','FrontEndController@sendMessage')->name('send.message');



// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Admin Dashboard Route
Route::get('/admin', 'DashboardController@index')->name('admin');

//All dashboard routes
Route::group(['prefix'=>'admin' , 'middleware'=>'auth'], function(){

    //trashed routes for admins
    Route::group(['middleware'=>'admin'] , function (){

        //Trashed category routes
        Route::get('/category/trashed','CategoryController@trashed')->name('category.trashed');
        Route::patch('/category/trashed/restore/{category}','CategoryController@restoreTrashed')->name('category.restore');
        Route::delete('/category/trashed/delete/{category}','CategoryController@deleteTrashed')->name('category.delete.trashed');

        //Trashed tag routes
        Route::get('/tag/trashed','TagController@trashed')->name('tag.trashed');
        Route::patch('/tag/trashed/restore/{tag}','TagController@restoreTrashed')->name('tag.restore');
        Route::delete('/tag/trashed/delete/{tag}','TagController@deleteTrashed')->name('tag.delete.trashed');
    });

    //Trashed post routes
    Route::get('/post/trashed','PostController@trashed')->name('post.trashed');
    Route::patch('/post/trashed/restore/{post}','PostController@restoreTrashed')->name('post.restore');
    Route::delete('/post/trashed/delete/{post}','PostController@deleteTrashed')->name('post.delete.trashed');

    //User permission routes
    Route::patch('/user/permission/admin/{user}','UserController@adminPermission')->name('make.admin')->middleware('owner');
    Route::patch('/user/permission/author/{user}','UserController@authorPermission')->name('make.author')->middleware('owner');

    //User Profile
    Route::get('/user/profile','ProfileController@index')->name('user.profile');
    Route::patch('/user/profile/update','ProfileController@update')->name('user.profile.update');

    //Website settings route
    Route::get('/settings','SettingController@index')->name('settings');
    Route::patch('/settings/update','SettingController@update')->name('settings.update');

    //User Messages routes
    Route::get('/message','MessageController@index')->name('admin.message.all');
    Route::get('/message/{message}','MessageController@show')->name('admin.message.show');
    Route::delete('message/{message}','MessageController@destroy')->name('admin.message.destroy');

    //Resources Routes
    Route::resource('/post','PostController');
    Route::resource('/category','CategoryController');
    Route::resource('/tag','TagController');
    Route::resource('/user','UserController');
    Route::resource('/product','ProductController');
});

//testing
Route::get('/test',function (){

    $categories = \App\Category::orderBy('created_at','desc')->get();
    foreach ($categories as $category){
        foreach ($category->posts as $post){
            echo $post['title']."<br>";
        }
    }
});
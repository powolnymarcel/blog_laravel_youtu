<?php


Route::get('/blog', [
    'uses'=>'BlogController@getList',
    'as'=>'blog.list'
]);

Route::get('/blog/{slug}', [
    'uses'=>'BlogController@getSingle',
    'as'=>'blog.single'
])->where('slug','[\w\d\-\_]+' );



Route::get('/contact', [
    'uses'=>'PagesController@getContact',
    'as'=>'contact'
]);
Route::get('/a-propos', [
    'uses'=>'PagesController@getAbout',
    'as'=>'a-propos'
]);
Route::get('/', [
    'uses'=>'PagesController@getIndex',
    'as'=>'accueil'
]);


//***********************************************************************Authentification
Route::get('auth/login', [
    'uses'=>'Auth\AuthController@getLogin',
    'as'=>'login.get'
]);

Route::post('auth/login', [
    'uses'=>'Auth\AuthController@postLogin',
    'as'=>'login.post'
]);

Route::get('auth/logout', [
    'uses'=>'Auth\AuthController@getLogout',
    'as'=>'logout'
]);

//**************************************************************************Inscription
Route::get('auth/register', [
    'uses'=>'Auth\AuthController@getRegister',
    'as'=>'register.get'
]);

Route::post('auth/register', [
    'uses'=>'Auth\AuthController@postRegister',
    'as'=>'register.post'
]);
//**************************************************************************password reset
Route::get('password/reset/{token?}',[
    'uses'=>'Auth\PasswordController@showResetForm',
    'as'=>'password.reset'
]);
Route::post('password/email',[
    'uses'=>'Auth\PasswordController@sendResetLinkEmail',
    'as'=>'password.email'
]);
Route::post('password/reset',[
    'uses'=>'Auth\PasswordController@reset',
    'as'=>'password.reset'
]);

// *******************************************************************Resources pour les POSTS
Route::resource('posts','PostController');

Route::resource('categories','CategoryController',['except'=>['create']]);
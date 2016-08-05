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
Route::post('/contact', [
    'uses'=>'PagesController@postContact',
    'as'=>'post.contact'
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


// Comments
Route::post('commentaires/{post_id}', ['uses' => 'CommentairesController@store', 'as' => 'commentaires.store']);
Route::get('commentaires/{id}/edit', ['uses' => 'CommentairesController@edit', 'as' => 'commentaires.edit']);
Route::put('commentaires/{id}', ['uses' => 'CommentairesController@update', 'as' => 'commentaires.update']);
Route::delete('commentaires/{id}', ['uses' => 'CommentairesController@destroy', 'as' => 'commentaires.destroy']);
Route::get('commentaires/{id}/delete', ['uses' => 'CommentairesController@delete', 'as' => 'commentaires.delete']);



// *******************************************************************Resources pour les POSTS
Route::resource('posts','PostController');
Route::resource('tags','TagController');

Route::resource('categories','CategoryController',['except'=>['create']]);
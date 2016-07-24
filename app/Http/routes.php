<?php
Route::get('blog/{slug}', [
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

Route::resource('posts','PostController');
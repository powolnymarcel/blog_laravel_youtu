<?php

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
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

Route::get('/', function () {
    return view('auth.login');
});




Route::get('Managers','managers@index');
Route::get('Add','managers@create');
Route::post('store','managers@store');
Route::get('edit/{id}','managers@edit');
Route::post('update/{id}','managers@update');
Route::get('delete/{id}','managers@destroy');
Route::get('test/{id}','managers@test');




Route::get('posts_active/{id}','posts@active');
Route::post('posts_reject','posts@reject');
Route::get('/posts','posts@index');
Route::get('/per','posts@firstper');
Route::get('/sper','posts@scondper');
Route::get('/thper','posts@therdper');
Route::get('/create_post','posts@create');
Route::post('store_post','posts@store');
Route::get('show/{id}','posts@show');
Route::get('posts_edit/{id}','posts@edit');
Route::post('posts_updata/{id}','posts@update');
Route::post('delete_post/{id}','posts@destroy');
Route::post('getmsg','posts@ajax');

Route::get('posts_prent/{id}','posts@prent');
Route::get('prented','posts@prented');

Route::get('backchive','posts@backchive');


Route::get('prented/{id}','posts@chive');




Route::get('correct/{id}','posts@correct');



Route::get('/corr','posts@correcter');
Route::get('/cooo','posts@cooo');



Route::get('/corrA','posts@correcterAdmin');
Route::get('/corrected','posts@corrected');




Route::resource('categories', 'categories');
Route::resource('sub_cat', 'sub_cat');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard','AdminController@dashboard');







Route::get('Tasks','Tasks@index');
Route::get('Tasksc','Tasks@create');
Route::post('store_task','Tasks@store');
Route::post('delete_task/{id}','Tasks@destroy');
Route::get('fin/{id}','Tasks@fin');



Route::get('printword/{id}','posts@printword');

Route::get('passedit','managers@passedit');


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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile', function () {
    return '<h1>This is profile page</h1>';
})->middleware('verified');

//todo
//Route::resource('todo', 'TodoController');
Route::post('/todo/add', 'TodoController@store');
Route::get('/todo/show', 'TodoController@show');
Route::post('/todo/delete', 'TodoController@destroy');
Route::post('/todo/update', 'TodoController@update');

//note
Route::post('/note/add', 'NoteController@store');
Route::get('/note/show', 'NoteController@show');
Route::post('/note/delete', 'NoteController@destroy');
Route::post('/note/update', 'NoteController@update');
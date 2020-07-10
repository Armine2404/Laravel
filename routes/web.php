<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

    Route::get('/todos','TodoController@index' )->name('todo.index');
    Route::get('/create','TodoController@create' );
    Route::get('/{todo}/edit','TodoController@edit' );
    Route::get('/{todo}/description','TodoController@description');
    Route::patch('/{todo}/update','TodoController@update' )->name('todo.update');
    Route::delete('/{todo}/delete','TodoController@delete' )->name('todo.delete');
    Route::post('/todo/create','TodoController@store' );



Route::get('/encuesta','EncuestaController@index' )->name('encuesta.index');
Route::post('/encuesta/store','EncuestaController@store' )->name('encuesta.create');

Route::put('/{todo}/complete','TodoController@complete' )->name('todo.complete');

Route::get('/', function () {
    return view('welcome');
});


// });

Route::get('/user', 'UserController@index');

Route::post('/upload', 'UserController@uploadAvatar');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/sobre', function () {
    return view('sobre');
})->name('sobre');

Auth::routes();

Route::resource('message', 'MessageController');

Route::resource('phone', 'PhoneController');


Route::get('/message/detalhes_extras/{message}', 'MessageController@detalhesExtras')->name('message.detalhesExtras');



Route::get('/home', 'HomeController@index')->name('home');

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


Route::get('phone/{user}', 'PhoneController@index')->name('phone.index');

Route::get('phone/create/{user}', 'PhoneController@create')->name('phone.create');

Route::post('phone/store', 'PhoneController@store')->name('phone.store');

Route::get('phone/{phone}/edit', 'PhoneController@edit')->name('phone.edit');

Route::put('phone/{phone}', 'PhoneController@update')->name('phone.update');

Route::delete('phone/{phone}', 'PhoneController@destroy')->name('phone.destroy');

Route::get('/message/detalhes_extras/{message}', 'MessageController@detalhesExtras')->name('message.detalhesExtras');



Route::get('/home', 'HomeController@index')->name('home');

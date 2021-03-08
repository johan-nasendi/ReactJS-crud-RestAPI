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

Route::get('/pages{any?}', function () {
    return view('welcome');
})->where('any', '^(?!api).*$');


Route::get('/', function () {
    return view('lading');
});



Auth::routes();

Route::get('/home{any?}', 'HomeController@index')->where('any', '^(?!api).*$')->name('home');

Route::post('/login', 'LoginAllController@sign')->name('login.sys');

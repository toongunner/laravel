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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/search','SearchController@index');

Route::resource('/search','SearchController');

Route::resource('/adddata','AddDataController');


Route::post('/image', 'AddDataController@storeImage');

Route::post('/pdf', 'AddDataController@storePDF');
Route::get('/pdf/{id}', 'SearchController@showPDF');
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
Route::get('/guestreport', 'ReportExcelController@homeguest')->name('homeguest');
// Route::get('/search','SearchController@index');

Route::resource('/search','SearchController');

Route::resource('/adddata','AddDataController');


Route::post('/image', 'AddDataController@storeImage');
Route::post('/imgdel','AddDataController@deleteImage');

Route::post('/pdf', 'AddDataController@storePDF');
Route::post('/pdf/view', 'SearchController@showPDF');

Route::resource('/update','UpdateController');

Route::get('/report', 'ReportExcelController@index');
Route::get('/report/battery','ReportExcelController@battIndex');
Route::get('/report/air','ReportExcelController@airIndex');
Route::get('/report/mdb','ReportExcelController@mdbIndex');
Route::get('/report/meter','ReportExcelController@meterIndex');
Route::get('/report/rectifier','ReportExcelController@rectifyIndex');
Route::get('/report/transformer','ReportExcelController@transformerIndex');
Route::get('/report/gen','ReportExcelController@genIndex');
Route::get('/report/ups','ReportExcelController@upsIndex');
Route::get('/report/inverter','ReportExcelController@inverterIndex');
Route::get('/report/all','ReportExcelController@equpAll');

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


Route::get('/app', function () {
    return view('layouts.app');
});


Route::get('/form', function () {
    return view('form');
});

Route::get('incident-form', 'App\Http\Controllers\IncidentReportingController@getProducts');

Route::post('incident', 'App\Http\Controllers\IncidentReportingController@reportIncident');


// Route::get('/incident', function () {
//     return view('form');
// });
<?php

use App\Http\Controllers\Controller;
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

// USER SIDE
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/detail/{id}', 'HomeController@detail');
Route::get('/rekomendasi', 'RekomendasiController@index');
Route::post('/hasil', 'RekomendasiController@hasil');
Route::get('/crank', 'RekomendasiController@crank');
// ADMIN SIDE
Route::get('/login', 'AdminController@login');
Route::post('/admin', 'AdminController@admin');

Route::get('/pantai', 'PantaiController@index');
Route::post('/pantai/create', 'PantaiController@store');
Route::get('/pantai/{id}', 'PantaiController@show');
Route::patch('/pantai/update', 'PantaiController@update');
Route::get('/pantai/delete/{id}', 'PantaiController@destroy');

Route::get('/covid', 'CovidController@index');
Route::post('/covid/create', 'CovidController@store');
Route::get('/covid/{id}', 'CovidController@show');
Route::patch('/covid/update', 'CovidController@update');
Route::get('/covid/delete/{id}', 'CovidController@destroy');

Route::get('/prokes', 'ProkesController@index');
Route::post('/prokes/create', 'ProkesController@store');
Route::get('/prokes/{id}', 'ProkesController@show');
Route::patch('/prokes/update', 'ProkesController@update');
Route::get('/prokes/delete/{id}', 'ProkesController@destroy');

Route::get('/prokes_pantai', 'Prokes_pantaiController@index');
Route::post('/prokes_pantai/create', 'Prokes_pantaiController@store');
Route::get('/prokes_pantai/{id}', 'Prokes_pantaiController@show');
Route::patch('/prokes_pantai/update', 'Prokes_pantaiController@update');
Route::get('/prokes_pantai/delete/{id}', 'Prokes_pantaiController@destroy');

Route::get('/sentimen', 'SentimenController@index');
Route::get('/sentimen/{id}', 'SentimenController@show');
Route::patch('/sentimen/update', 'SentimenController@update');
Route::get('/sentimen/delete/{id}', 'SentimenController@destroy');
<?php

use App\Http\Controllers\PlaceController;
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

// Route::get('/places', 'PlaceController@index')->name('places.index');
// Route::get('/places/show/{id}', 'PlaceController@show')->name('places.show');
// Route::get('/places/create', 'PlaceController@create')->name('places.create');
// Route::get('/places/edit/{id}', 'PlaceController@edit')->name('places.edit');
Route::resource('places', 'PlaceController')->except('destroy');

// Route::resource('places', PlaceController::class)->except('destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

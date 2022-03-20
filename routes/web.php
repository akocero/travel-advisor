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

Route::resource('places', 'PlaceController')->except('destroy');
Route::apiResource('TOAS', 'ToaController')->except('destroy');
// Route::resource('places', PlaceController::class)->except('destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'MainController@index');
Route::get('/toa/{id}', 'AttractionController@index');
Route::get('/attractions/{place}', 'AttractionController@show');
Route::post('/review', 'ReviewController@store')->name('reviews.store');

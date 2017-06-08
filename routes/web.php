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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
  Route::resource('cartypes', 'CarTypesController');
  Route::resource('cars', 'CarsController');
  Route::resource('categories', 'CategoriesController');
  Route::resource('places', 'PlacesController');
  Route::resource('transactions', 'TransactionsController');
  Route::resource('confirmations', 'ConfirmationsController');
});

/*
--route myprofil dan ubah password
*/
Route::get('admin/settings', 'SettingsController@profile');
Route::post('admin/settings', 'SettingsController@update');
Route::get('admin/settings/password', 'SettingsController@editPassword');
Route::post('admin/settings/password', 'SettingsController@updatePassword');

/*
-- route ajax dropdown wilayah
*/
Route::get('/admin/places/kabupaten/{id}', 'PlacesController@kabupaten');
Route::get('/admin/places/kecamatan/{id}', 'PlacesController@kecamatan');
Route::get('/admin/places/kelurahan/{id}', 'PlacesController@kelurahan');

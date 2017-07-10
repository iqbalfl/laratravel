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

//route front search
Route::get('search-destination', ['as'=>'search-destination','uses'=>'AllSearchController@destination']);
Route::get('search-budget', ['as'=>'search-budget','uses'=>'AllSearchController@budget']);
Route::get('search-car', ['as'=>'search-car','uses'=>'AllSearchController@car']);

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
  Route::resource('cartypes', 'CarTypesController');
  Route::resource('cars', 'CarsController');
  Route::resource('categories', 'CategoriesController');
  Route::resource('places', 'PlacesController');
  Route::resource('transactions', 'TransactionsController');
  Route::resource('confirmations', 'ConfirmationsController');
  /*
  --route myprofil dan ubah *admin*
  */
  Route::get('settings', 'SettingsController@profile');
  Route::post('settings', 'SettingsController@update');
  Route::get('settings/password', 'SettingsController@editPassword');
  Route::post('settings/password', 'SettingsController@updatePassword');
});

Route::group(['prefix'=>'member', 'middleware'=>['auth', 'role:member']], function () {
  Route::resource('orders', 'MemberOrdersController');
  Route::post('orders/confirmation', 'MemberOrdersController@storeconf');
  Route::get('orders/dest/{id}', 'MemberOrdersController@orderdest');
  Route::get('orders/car/{id}', 'MemberOrdersController@ordercar');
  Route::get('orders/cetak/{id}', 'MemberOrdersController@cetak');
  /*
  --route myprofil dan ubah password *member*
  */
  Route::get('settings', 'MemberSettingsController@profile');
  Route::post('settings', 'MemberSettingsController@update');
  Route::get('settings/password', 'MemberSettingsController@editPassword');
  Route::post('settings/password', 'MemberSettingsController@updatePassword');
});


/*
-- route ajax dropdown wilayah
*/
Route::get('/admin/places/kabupaten/{id}', 'PlacesController@kabupaten');
Route::get('/admin/places/kecamatan/{id}', 'PlacesController@kecamatan');
Route::get('/admin/places/kelurahan/{id}', 'PlacesController@kelurahan');

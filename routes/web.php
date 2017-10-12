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
    return view('master');
});

// Auth routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// ADMIN ROUTES
// Main admin page
Route::get('/admin', function () {
    return view('admin/main');
});
// Countries
Route::get('/countries', [
  'uses' => 'CountryController@index',
  'as' => 'country.show'
]);

Route::get('/countries/create', [
  'uses' => 'CountryController@create',
  'as' => 'country.create'
]);

Route::post('/country/store', [
  'uses' => 'CountryController@store',
  'as' => 'country.store'
]);

Route::get('/country/{country}/edit', [
  'uses' => 'CountryController@edit',
  'as' => 'country.edit'
]);

Route::post('/country/{id}/update', [
  'uses' => 'CountryController@update',
  'as' => 'country.update'
]);

Route::get('/country/{id}/delete', [
  'uses' => 'CountryController@delete',
  'as' => 'country.delete'
]);

// Comments Routes




// Customer Routes




// Order Routes




// Wine Routes

Route::get('/wines', [
  'uses' => 'WineController@index',
  'as' => 'wine.show',
]);

Route::get('/wines/create', [
  'uses' => 'WineController@create',
  'as' => 'wine.create'
]);

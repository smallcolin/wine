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

// PUBLIC ROUTES
// Show shop
Route::get('/', [
  'uses' => 'WineController@showAll',
  'as' => 'store.wines.showAll'
]);
// Show one wine
Route::get('/wines/{id}', [
  'uses' => 'WineController@showOne',
  'as' => 'wine.showOne'
]);
// Filter wines by country
Route::get('/wines/{country}/filter', [
  'uses' => 'WineController@filterWine',
  'as' => 'wine.filter',
]);
// Gallery Main page link
Route::get('/gallery', function () {
    return view('gallery.main');
});
// Show all Images (Gallery)
Route::get('/gallery', [
  'uses' => 'ImagesController@customerShowImages',
  'as' => 'gallery.show',
]);
// Add item to cart
Route::get('/cart/addItem/{id}', [
  'uses' => 'CartController@addItem',
  'as' => 'cart.addItem'
]);

// AUTH ROUTES
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// ADMIN ROUTES
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
  // Main admin page
  Route::get('', function () {
    return view('admin/main');
  });
  // Countries
  Route::resource('/countries', 'CountryController', [
    'except' => ['show']
  ]);
  // Customer Routes
  Route::resource('/customers', 'CustomerController', [
    'except' => ['show']
  ]);
  // Comments
  Route::resource('/comments', 'CommentController', [
    'except' => ['show', 'store']
  ]);
  // Orders
  Route::resource('/orders', 'OrderController', [
    'except' => ['show', 'store']
  ]);
  // Wines
  Route::resource('/wines', 'WineController', [
    'except' => ['show', 'store', 'create']
  ]);
  // Images
  Route::resource('/images', 'ImagesController', [
    'except' => ['show', 'store']
  ]);
  // Export CSV files
  Route::get('/export', function () {
      return view('admin/export/exportCsv');
  });
  Route::post('/export/data', [
    'uses' => 'ExportController@download',
    'as' => 'export.createCsvFile'
  ]);
});

// CUSTOMER ROUTES
Route::group(['prefix' => 'customers'], function() {
  // Login Routes
  Route::get('/login', [
    'uses' => 'Auth\CustomerLoginController@showLoginForm',
    'as' => 'customers.login',
  ]);
  Route::post('/login', [
    'uses' => 'Auth\CustomerLoginController@login',
    'as' => 'customers.attempt',
  ]);
  Route::post('/logout', [
    'uses' => 'Auth\CustomerLoginController@logout',
    'as' => 'customers.logout',
  ]);
  // Main customer page
  Route::get('', function() {
      return view('customers.main');
  });
  // Upload and save images
  Route::post('/gallery/store', [
    'uses' => 'ImagesController@store',
    'as' => 'gallery.store'
  ]);
  // My Orders
  Route::get('/myOrders', [
    'uses' => 'OrderController@showMyOrders',
    'as' => 'customerOrder.show'
  ]);
  // Create a wine
  Route::get('/wines/create', [
    'uses' => 'WineController@create',
    'as' => 'wine.create'
  ]);
  // Save a wine
  Route::post('/wine/store', [
    'uses' => 'WineController@store',
    'as' => 'wine.store'
  ]);
  // CART ROUTES
  Route::resource('/cart', 'CartController');
  // CHECKOUT ROUTES
  Route::resource('/checkout', 'CheckoutController');
  // Create an order
  Route::post('/checkout/createorder}', [
    'uses' => 'CheckoutController@createOrder',
    'as' => 'checkout.createOrder',
  ]);
  // Customer Comments
  Route::resource('/comments', 'CustomerCommentController', [
    'except' => ['show']
  ]);
});

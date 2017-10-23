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
// Show shop
Route::get('/', [
  'uses' => 'WineController@showAll',
  'as' => 'store.wines.showAll'
]);

// Auth routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// ADMIN ROUTES
Route::group(['middleware' => 'auth'], function() {
  // Main admin page
  Route::get('/admin', function () {
    return view('admin/main');
  });

  // Countries
  Route::resource('/admin/countries', 'CountryController', [
    'except' => ['show']
  ]);
  // Customer Routes
  Route::resource('/admin/customers', 'CustomerController', [
    'except' => ['show']
  ]);
  // Comments
  Route::resource('/admin/comments', 'CommentController', [
    'except' => ['show', 'store']
  ]);
  // Orders
  Route::resource('/admin/orders', 'OrderController', [
    'except' => ['show', 'store']
  ]);
  // Wines
  Route::resource('/admin/wines', 'WineController', [
    'except' => ['show', 'store']
  ]);
  // Images
  Route::resource('/admin/images', 'ImagesController', [
    'except' => ['show', 'store']
  ]);

    // Export CSV files
    Route::get('/export', function () {
        return view('admin/export/exportCsv');
    });
    // Make CSV file and export it
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
  // My Orders
  Route::get('/myOrders', [
    'uses' => 'OrderController@showMyOrders',
    'as' => 'customerOrder.show'
  ]);
  // Upload and save images
  Route::post('/gallery/store', [
    'uses' => 'ImagesController@store',
    'as' => 'gallery.store'
  ]);
});

// CUSTOMER ROUTES
  // Main customer page
  Route::get('/customer', function () {
      return view('customers.main');
  });

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

  // Show all comments
  Route::get('/customer/comments', [
    'uses' => 'CommentController@showCustomerComment',
    'as' => 'customerComment.show'
  ]);
  // Save a comment
  Route::post('/comment/store', [
    'uses' => 'CommentController@store',
    'as' => 'comment.store'
  ]);
  // Delete Comments
  Route::get('/customer/comments/{id}/delete', [
    'uses' => 'CommentController@customerCommentDelete',
    'as' => 'customerComment.delete'
  ]);
  // Edit a comment
  Route::get('/customer/comment/{comment}/edit', [
    'uses' => 'CommentController@customerCommentEdit',
    'as' => 'customerComment.edit'
  ]);
  // Update a comment
  Route::post('/customer/comment/{id}/update', [
    'uses' => 'CommentController@customerCommentUpdate',
    'as' => 'customerComment.update'
  ]);



  // CART ROUTES
  Route::resource('/cart', 'CartController');
  // adding item to cart
  Route::get('/cart/addItem/{id}', [
    'uses' => 'CartController@addItem',
    'as' => 'cart.addItem'
  ]);
  // CHECKOUT ROUTES
  Route::resource('/checkout', 'CheckoutController');
  // Create an order
  Route::post('/checkout/createorder}', [
    'uses' => 'CheckoutController@createOrder',
    'as' => 'checkout.createOrder',
  ]);

  // GALLERY ROUTES
  // Main page link
  Route::get('/gallery', function () {
      return view('gallery.main');
  });
  // Show all Images (Gallery)
  Route::get('/gallery', [
    'uses' => 'ImagesController@customerShowImages',
    'as' => 'gallery.show',
  ]);

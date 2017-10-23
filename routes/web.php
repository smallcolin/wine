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

  // COMMENTS ROUTES
    // Admin Comments page
    Route::get('/comments', [
      'uses' => 'CommentController@index',
      'as' => 'comment.show'
    ]);
    // Delete Comments
    Route::get('/comment/{id}/delete', [
      'uses' => 'CommentController@delete',
      'as' => 'comment.delete'
    ]);
    // Edit a comment
    Route::get('/comment/{comment}/edit', [
      'uses' => 'CommentController@edit',
      'as' => 'comment.edit'
    ]);
    // Update a comment
    Route::post('/comment/{id}/update', [
      'uses' => 'CommentController@update',
      'as' => 'comment.update'
    ]);

    // Export CSV files
    // Basic admin page
    Route::get('/export', function () {
        return view('admin/export/exportCsv');
    });
    // Make CSV file and export it
    Route::post('/export/data', [
      'uses' => 'ExportController@download',
      'as' => 'export.createCsvFile'
    ]);

    // Admin Order routes
    // Show all orders
    Route::get('/orders', [
      'uses' => 'OrderController@index',
      'as' => 'order.show'
    ]);
    // Delete an order
    Route::get('/order/{id}/delete', [
      'uses' => 'OrderController@delete',
      'as' => 'order.delete'
    ]);

  // Wine Routes
    // Show all Wines
    Route::get('/wines', [
      'uses' => 'WineController@index',
      'as' => 'wine.show',
    ]);
    // Edit a wine
    Route::get('/wine/{wine}/edit', [
      'uses' => 'WineController@edit',
      'as' => 'wine.edit'
    ]);
    // Update a wine
    Route::post('/wine/{id}/update', [
      'uses' => 'WineController@update',
      'as' => 'wine.update'
    ]);
    // Delete a wine
    Route::get('/wine/{id}/delete', [
      'uses' => 'WineController@delete',
      'as' => 'wine.delete'
    ]);

    // Gallery routes
    // Show all images (admin)
    Route::get('/admin/images', [
      'uses' => 'ImagesController@adminShowImages',
      'as' => 'adminImages.show',
    ]);
    // Delete an image
    Route::get('/admin/comments/{id}/delete', [
      'uses' => 'ImagesController@delete',
      'as' => 'galleryImage.delete'
    ]);
    // Edit an image
    Route::get('/admin/image/{image}/edit', [
      'uses' => 'ImagesController@edit',
      'as' => 'galleryImage.edit'
    ]);
    // Update a image
    Route::post('/admin/image/{id}/update', [
      'uses' => 'ImagesController@update',
      'as' => 'galleryImage.update'
    ]);
});

// CUSTOMER LOGIN ROUTES
Route::get('/customers/login', [
  'uses' => 'Auth\CustomerLoginController@showLoginForm',
  'as' => 'customers.login',
]);
Route::post('/customers/login', [
  'uses' => 'Auth\CustomerLoginController@login',
  'as' => 'customers.attempt',
]);
Route::post('/customers/logout', [
  'uses' => 'Auth\CustomerLoginController@logout',
  'as' => 'customers.logout',
]);

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


  // Order Routes
  // Create an order
  Route::get('/order/{id}/store', [
    'uses' => 'OrderController@store',
    'as' => 'order.store'
  ]);
  // Purchase Route
  Route::post('/orders/purchase', [
    'uses' => 'OrderController@purchase',
    'as' => 'order.purchase',
  ]);
  // My Orders
  Route::get('/orders/myOrders', [
    'uses' => 'OrderController@showMyOrders',
    'as' => 'customerOrder.show'
  ]);

  // Images upload
  // Main page link
  Route::get('/gallery', function () {
      return view('gallery.main');
  });

  // Upload and save images
  Route::post('/gallery/store', [
    'uses' => 'ImagesController@store',
    'as' => 'gallery.store'
  ]);

  // More wine routes
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
  // Show all Images (Gallery)
  Route::get('/gallery', [
    'uses' => 'ImagesController@index',
    'as' => 'gallery.show',
  ]);

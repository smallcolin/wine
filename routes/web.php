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
  // Main admin page
  Route::get('/admin', function () {
      return view('admin/main');
  });
  // Countries
  Route::get('/countries', [
    'uses' => 'CountryController@index',
    'as' => 'country.show'
  ]);
  // Create a country
  Route::get('/countries/create', [
    'uses' => 'CountryController@create',
    'as' => 'country.create'
  ]);
  // Save a country
  Route::post('/country/store', [
    'uses' => 'CountryController@store',
    'as' => 'country.store'
  ]);
  // Edit a country
  Route::get('/country/{country}/edit', [
    'uses' => 'CountryController@edit',
    'as' => 'country.edit'
  ]);
  // Update a country
  Route::post('/country/{id}/update', [
    'uses' => 'CountryController@update',
    'as' => 'country.update'
  ]);
  // Delete a country
  Route::get('/country/{id}/delete', [
    'uses' => 'CountryController@delete',
    'as' => 'country.delete'
  ]);
  // Customer Routes
  // Show all customers
  Route::get('/admin/customers', [
    'uses' => 'CustomerController@index',
    'as' => 'customer.show'
  ]);
  // Delete a customer
  Route::get('/customer/{id}/delete', [
    'uses' => 'CustomerController@delete',
    'as' => 'customer.delete'
  ]);
  // Edit a customer
  Route::get('/customer/{customer}/edit', [
    'uses' => 'CustomerController@edit',
    'as' => 'customer.edit'
  ]);
  // Update a customer
  Route::post('/customer/{id}/update', [
    'uses' => 'CustomerController@update',
    'as' => 'customer.update'
  ]);



// COMMENTS ROUTES
  // Admin Comments page
  Route::get('/comments', [
    'uses' => 'CommentController@index',
    'as' => 'comment.show'
  ]);
  // Save a comment
  Route::post('/comment/store', [
    'uses' => 'CommentController@store',
    'as' => 'comment.store'
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







// CUSTOMER ROUTES

  // Login pages
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

  // Main customer page
  Route::get('/customer', function () {
      return view('customers/main');
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



// Order Routes
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
  // Show one wine
  Route::get('/wines/{id}', [
    'uses' => 'WineController@showOne',
    'as' => 'wine.showOne'
  ]);

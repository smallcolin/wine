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
// Customer Routes
Route::get('/admin/customers', [
  'uses' => 'CustomerController@index',
  'as' => 'customer.show'
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




// Wine Routes

Route::get('/wines', [
  'uses' => 'WineController@index',
  'as' => 'wine.show',
]);

Route::get('/wine/{wine}/edit', [
  'uses' => 'WineController@edit',
  'as' => 'wine.edit'
]);

Route::post('/wine/{id}/update', [
  'uses' => 'WineController@update',
  'as' => 'wine.update'
]);

Route::get('/wine/{id}/delete', [
  'uses' => 'WineController@delete',
  'as' => 'wine.delete'
]);

Route::get('/wines/{id}', [
  'uses' => 'WineController@showOne',
  'as' => 'wine.showOne'
]);

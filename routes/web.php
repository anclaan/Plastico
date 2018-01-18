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

Route::get('/', 'PagesController@getIndex');

Route::get('oferta', 'PagesController@getOferta');

Route::get('galeria', 'PagesController@getGaleria');

Route::get('oNas', 'PagesController@getONas');

Route::get('kontakt', 'PagesController@getKontakt');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  // Route::get('/calendar','AdminController@calendar');
  Route::get('/buttons','AdminController@buttons');
  Route::get('/editors','AdminController@editors');
  Route::get('/stats','AdminController@stats');

  // Users routes
  Route::get('/users/index','UsersController@index');
  Route::get('/users/{id}/update','UsersController@update');
  Route::get('/users/{id}/destroy','UsersController@destroy');

  // Customers routes
  Route::get('/customers/index','CustomersController@index');
  // Route::get('/customers/{id}/edit','CustomersController@edit');
  // Route::post('/customers/{id}/update','CustomersController@update');
  Route::get('/customers/{id}/destroy','CustomersController@destroy');

  // Events routes
  Route::get('/events/create','EventsController@create');

  // Orders routes
  Route::get('/orders/index','OrdersController@index');
  Route::get('/orders/create','OrdersController@showCreateForm');
  Route::post('/orders/create','OrdersController@create');
  Route::get('/orders/{id}/destroy','OrdersController@destroy');
  Route::get('/orders/{id}/update','OrdersController@update');
  Route::get('/orders/get/{id}', 'OrdersController@getProducts');

  // Product routes
  Route::get('/products/index','ProductsController@index');
  Route::get('/product/index','ProductsController@getProductType');
  Route::get('/products/create','ProductsController@showCreateForm');
  Route::post('/products/create','ProductsController@create');
  Route::get('/product/addProducts','ProductsController@create');
  Route::post('/product/addProducts','ProductsController@addProducts');
  Route::get('/products/{id}/destroy','ProductsController@destroy');
  // Route::post('/products/{id}/update','ProductsController@update');





});

  Route::get('admin/calendar',function()
    {
      return view ('admin.calendar');
    });
  Route::resource('events', 'EventsController',['only' => ['index', 'store','update','destroy','create']]);
  Route::resource('products', 'ProductsController',['only' => ['index', 'store','create','addProducts','update','edit']]);
  Route::resource('orders', 'OrdersController');
  Route::resource('customers', 'CustomersController',['only' => ['index', 'store','create','update','edit']]);
  Route::resource('users', 'UsersController',['only' => ['index', 'store','create']]);

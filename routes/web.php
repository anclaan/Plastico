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
  Route::get('/users','UsersController@index');
  Route::get('/users/destroy','UsersController@destroy');
  Route::get('/users/update','UsersController@update');

  // Customers routes
  Route::get('/klienci','CustomersController@index');
  Route::get('/klienci/destroy','CustomersController@destroy');
  Route::get('/klienci/update','CustomersController@update');

  // Events routes
  Route::get('/events/create','EventsController@create');

  // Orders routes
  Route::get('/orders','OrdersController@index');
  Route::get('/orders/create','OrdersController@create');
  Route::get('/orders/destroy','OrdersController@destroy');
  Route::get('/orders/update','OrdersController@update');

  // Product routes
  Route::get('/products/index','ProductsController@index');
  Route::get('/products/create','ProductsController@showCreateForm')->name('admin.products.create');
  Route::post('/products/create','ProductsController@create')->name('admin.products.create.submit');
  Route::get('/products/destroy','ProductsController@destroy');
  Route::get('/products/update','ProductsController@update');





});

  Route::get('admin/calendar',function()
    {
      return view ('admin.calendar');
    });
  Route::resource('events', 'EventsController',['only' => ['index', 'store','update','destroy','create']]);
  Route::resource('products', 'ProductsController',['only' => ['index', 'store','update','destroy','create']]);

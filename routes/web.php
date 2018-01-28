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
Auth::routes();

Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  });

Route::group(['middleware' => ['auth:admin']], function (){

  Route::prefix('admin')->group(function(){

    Route::get('/', 'AdminController@index')->name('admin.index');

    // Calendar routes
    Route::get('/calendar','AdminController@calendar')->name('admin.calendar');

    // Users routes
    Route::get('/users/index','UsersController@index');
    Route::get('/users/{id}/update','UsersController@update');
    Route::get('/users/{id}/destroy','UsersController@destroy');

    // Customers routes
    Route::get('/customers/index','CustomersController@index');
    // Route::get('/customers/{id}/edit','CustomersController@edit');
    // Route::post('/customers/{id}/update','CustomersController@update');
    Route::get('/customers/{id}/destroy','CustomersController@destroy');
    Route::get('/customers/searchCustomers', 'OrdersController@searchCustomers');

    // Events routes
    Route::get('/events/create','EventsController@create');

    // Orders routes
    Route::get('/orders/index','OrdersController@index');
    Route::get('/orders/create','OrdersController@showCreateForm');
    Route::post('/orders/create','OrdersController@create');
    Route::get('/orders/store','OrdersController@store');
    Route::get('/orders/addOrder','OrdersController@addOrder');
    Route::get('/orders/{id}/destroy','OrdersController@destroy');
    Route::get('/orders/update','OrdersController@update');
    Route::get('/orders/get/{id}', 'OrdersController@getProducts');
    Route::get('/orders/clear', 'OrdersController@clearListOfOrderProducts');
    Route::get('/orders/{id}/clear', 'OrdersController@deleteProductFromListOfOrderProducts');

    // Product routes
    Route::get('/products/index','ProductsController@index');
    Route::get('/product/index','ProductsController@getProductType');
    Route::post('/products/create','ProductsController@create');
    Route::get('/products/{id}/destroy','ProductsController@destroy');
    // Route::post('/products/{id}/update','ProductsController@update');
  });
});

Route::get('/', 'PagesController@getIndex');
Route::get('oferta', 'PagesController@getOferta');
Route::get('galeria', 'PagesController@getGaleria');
Route::get('oNas', 'PagesController@getONas');
Route::get('kontakt', 'PagesController@getKontakt');
Route::get('/home', 'HomeController@index')->name('home');


  // Route::get('admin/calendar',function()
  //   {
  //     return view ('admin.calendar');
  //   });
Route::resource('events', 'EventsController',['only' => ['index', 'store','update','destroy','create']]);
Route::resource('products', 'ProductsController',['only' => ['index', 'store','create','addProducts','update','edit']]);
Route::resource('orders', 'OrdersController',['only' => ['index', 'getProducts','store','addOrder','create']]);
Route::resource('customers', 'CustomersController',['only' => ['index', 'store','create','update','edit']]);
Route::resource('users', 'UsersController',['only' => ['index', 'store','create']]);

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
  Route::get('/users','UsersController@index');
  Route::get('/users/destroy','UsersController@destroy');
  Route::get('/users/update','UsersController@update');
  Route::get('/klienci','KlientsController@index');
  Route::get('/klienci/destroy','KlientsController@destroy');
  Route::get('/klienci/update','KlientsController@update');



});

  Route::get('admin/calendar',function()
    {
      return view ('admin.calendar');
    });
  Route::resource('events', 'EventsController',['only' => ['index', 'store','update','destroy']]);

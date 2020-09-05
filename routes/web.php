<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ProductController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')
  ->name('home');

Route::resource('/category', 'CategoryController');
Route::resource('/product', 'ProductController');
Route::get('/order/admin', 'OrderController@admin')
  ->middleware(['auth', 'admin'])
  ->name('order.admin');
Route::resource('/order', 'OrderController')
  ->middleware(['auth'])
  ->only(['index', 'store', 'show']);

Route::group([
  'middleware' => ['auth', 'admin'],
  'name' => 'settings.',
  'prefix' => 'settings',
], function () {
    Route::get('/', 'SettingsController@index')
      ->name('settings.index');
    Route::post('/', 'SettingsController@store')
      ->name('settings.store');
});

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

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/about', 'PagesController@about');

Route::get('recipes/copy/{id}', 'RecipeController@copy');
Route::delete('recipes/delete/{id}','RecipeController@delete');
Route::resource('recipes', 'RecipeController');


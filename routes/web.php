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

Route::resource('lists', 'ListsController', ['except' => ['create']]);

Route::get('table', 'ListsController@getTable');

// Route::get('/', function () {
//     return redirect()->route('lists.index');
// });

Route::redirect('/', '/lists', 301);

//Auth::routes();

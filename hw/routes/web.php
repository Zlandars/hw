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
Route::get('link', 'ShortLinkController@index');
Route::get('createLink', 'ShortLinkController@createLink');
Route::get('link/{id}', 'ShortLinkController@index');
Route::get('deleteLink', 'ShortLinkController@deleteLink');
});

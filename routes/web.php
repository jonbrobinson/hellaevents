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

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/organizations', 'OrganizationsController@index');
Route::get('/organizations/create', 'OrganizationsController@create');
Route::get('/organizations/{id}', 'OrganizationsController@show');
Route::post('/organizations/store', 'OrganizationsController@store');

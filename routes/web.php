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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'HomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('gmaps', 'HomeController@gmaps')->name('gmaps.index');
Route::get('gmaps/{producto_id}', 'HomeController@gmaps')->name('gmaps.index.producto_id');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('all-ciudades', CiudadesController::class);
        Route::resource('all-productos', ProductosController::class);
        Route::resource('users', UserController::class);
    });

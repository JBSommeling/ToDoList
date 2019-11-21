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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('/admin/users', 'Admin\UsersController', ['except' => ['show', 'create' , 'store']]); //Zorgt ervoor dat alle CRUD functies ge'rout' zijn.

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/user', 'UsersController', ['except' => ['show', 'create' , 'store']]); //Zorgt ervoor dat alle CRUD functies ge'rout' zijn.

});
// namespace admin zorgt ervoor dat we geen Admin ergens voor meer hoeven te zetten bij controller.
//Prefix admin zorgt er voor dat we geen admin meer voorhoeven te zetten bij links.
//admin. zorgt ervoor dat er bij de name admin. voor komt te staan.
//Dit geld voor alle routes binnen de functie

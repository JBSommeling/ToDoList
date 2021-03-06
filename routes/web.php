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
    Route::resource('/user', 'UsersController', ['except' => ['create' , 'store']]); //Zorgt ervoor dat alle CRUD functies ge'rout' zijn.
    Route::get('/user/{user}', 'UsersController@show')->name('user.show')->middleware('AuthAdmin');
    Route::namespace("Tasklist")->group(function (){
       Route::resource('/tasklist', 'TasklistsController');
    });
    Route::namespace("Task")->group(function (){
        route::get('/task/index/{user_id}/{list_id}', 'TaskController@index')->name('task.index');
        route::get('/task/{task_id}', 'TaskController@show')->name('task.show');
        route::delete('/task/{task_id}/{user_id}/{list_id}', 'TaskController@destroy')->name('task.destroy');
    });
});

Route::namespace("Tasklist")->middleware('can:manage-guests')->middleware('AuthResource')->group(function(){
    route::resource('/tasklist', 'TasklistsController');
    route::get('/tasklist/lists/load', 'TasklistsController@load')->name('tasklist.lists.load');
});

Route::namespace('Task')->middleware('can:manage-guests')->middleware('AuthResource')->group(function(){
   route::resource('/task', 'TaskController');
   route::get('/task/index/{user_id}/{list_id}', 'TaskController@index')->name('task.index');
   route::get('/task/index/{user_id}/{list_id}/{sort}', 'TaskController@sort')->name('task.index.sort');
   route::put('/task/{task}', 'TaskController@update')->name('task.update');
   route::get('/task/lists/{list_id}', 'TaskController@load')->name('task.lists.load');
   route::delete('/task/{task}/{user_id}/{list_id}', 'TaskController@destroy')->name('task.destroy');
});


// namespace admin zorgt ervoor dat we geen Admin ergens voor meer hoeven te zetten bij controller.
//Prefix admin zorgt er voor dat we geen admin meer voorhoeven te zetten bij links.
//admin. zorgt ervoor dat er bij de name admin. voor komt te staan.
//group. Dit geld voor alle routes binnen de functie

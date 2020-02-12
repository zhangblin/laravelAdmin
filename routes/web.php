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


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get("/login", "LoginController@index")->name("login");
    Route::post("/login", "LoginController@store")->name("login");

    Route::middleware("auth")->group(function () {
        Route::get("/", "HomeController@index")->name("admin");
        Route::get("/logout", "LoginController@destroy")->name("logout");
    });

});

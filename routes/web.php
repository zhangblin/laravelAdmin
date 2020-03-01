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
        Route::get("/", "HomeController@index")->name("admin.home");
        Route::get("/welcome", "HomeController@welcome")->name("admin.welcome");
        Route::get("/getMenuList","HomeController@getMenuList")->name("admin.menu");
        Route::delete("/logout", "LoginController@destroy")->name("logout");

        //用户管理
        Route::resource("user","UserController",["only"=>["edit","update"]]);
        //菜单管理
        Route::resource("menu","MenuController",["only"=>["index","create","store","show","update","destroy"]]);
        Route::get("/menuList","MenuController@menuList")->name("admin.menuList");

    });

});

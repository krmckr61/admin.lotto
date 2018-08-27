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

//Routes for authentication
Auth::routes();

//Routes for modules
Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {

    Route::get('/', 'Dashboard\\DashboardController@index');

    Route::group(['prefix' => 'boards'], function () {
        $controller = 'Board\\BoardController@';
        Route::get('/', $controller . 'index');
        Route::get('/add', $controller . 'add');
        Route::get('/edit/{id}', $controller . 'edit');
        Route::post('/update/{id}', $controller . 'update');
        Route::get('/delete/{id}', $controller . 'delete');
    });

    Route::group(['prefix' => 'clients'], function () {
        $controller = 'Client\\ClientController@';
        Route::get('/', $controller . 'index');
        Route::get('/add', $controller . 'add');
        Route::get('/edit/{id}', $controller . 'edit');
        Route::post('/update/{id}', $controller . 'update');
        Route::get('/delete/{id}', $controller . 'delete');
    });

    Route::group(['prefix' => 'settings'], function () {
        $controller = 'Setting\\SettingController@';
        Route::get('/', $controller . 'index');
        Route::get('/edit/{id}', $controller . 'edit');
        Route::post('/update/{id}', $controller . 'update');
    });

    Route::group(['prefix' => 'game'], function () {
        $controller = 'Game\\GameController@';
        Route::get('/', $controller . 'index');
    });

    Route::group(['prefix' => 'balances'], function () {
        $controller = 'Balance\\BalanceController@';
        Route::get('/', $controller . 'index');
    });

    Route::group(['prefix' => 'live'], function () {
        $controller = 'Live\\LiveController@';
        Route::get('/', $controller . 'index');
    });

    Route::get('/watch', 'Watch\\WatchController@index');

});
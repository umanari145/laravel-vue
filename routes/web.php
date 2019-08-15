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
Route::match(['get', 'post'], '', 'TopController@index')->name('top@index');

Route::group(['prefix' => 'api'], function () {

    Route::get('getPref', "Api\AreaController@getPref")->name('getPref');
    Route::get('getCity', "Api\AreaController@getCity")->name('getCity');
    Route::get('getTown', "Api\AreaController@getTown")->name('getTown');

    Route::group(['prefix' => 'persons'], function () {
        Route::get('', "Api\MemberController@list")->name('member@list');
    });
});

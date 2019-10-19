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
Route::match(['get','post'], 'regist', 'TopController@index')->name('top@index');


Route::group(['prefix' => 'api'], function () {

    Route::get('getPref', "Api\AreaController@getPref")->name('getPref');
    Route::get('getCity', "Api\AreaController@getCity")->name('getCity');
    Route::get('getTown', "Api\AreaController@getTown")->name('getTown');
    Route::get('getAddress', "Api\AreaController@getAddress")->name('getAddress');

    Route::group(['prefix' => 'member'], function () {
        Route::get('list', "Api\MemberController@list")->name('member@list');
        Route::post('regist', "Api\MemberController@regist")->name('member@regist');
        Route::get('detail/{memberId}', "Api\MemberController@detail")->name('member@detail');
        Route::put('edit/{memberId}', "Api\MemberController@edit")->name('member@edit');
    });
});

Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');

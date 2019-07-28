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


Route::get('catchPageData', 'FunctionController\CurlController@catchPageData');
Route::get('testList', 'FunctionController\FunctionController@testList');
Route::get('testList2', 'FunctionController\FunctionController@testList2');
Route::get('getAdminUser', 'EloquentController\BaseController@getAdminUser');
//Route::get('/saying', Saying::class);
//Route::get('saying', 'TestController@testByeController');

//练习guzzle
Route::group(['prefix' => 'guzzle'], function (){
    Route::get('testGet', 'Guzzle\GuzzleController@testGetRequest');
    Route::get('testGet1', 'Guzzle\GuzzleController@testGetRequest1');
    Route::get('testGetSend', 'Guzzle\GuzzleController@testGetSend');
    Route::get('testPostRequest', 'Guzzle\GuzzleController@testPostRequest');
    Route::get('testPostRequest1', 'Guzzle\GuzzleController@testPostRequest1');
    Route::any('getTestData', 'Guzzle\GuzzleController@getTestData')->name('getTestData');

});
Route::get('userLastLogin', 'UserController@useSubSelectGetUserLastLogin');
Route::get('createLoginRecord', 'LoginController@createLoginRecord');

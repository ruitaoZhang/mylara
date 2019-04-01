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
Route::get('throwExcept', 'ExceptionController@throwExcept');
//Route::get('/saying', Saying::class);
//Route::get('saying', 'TestController@testByeController');
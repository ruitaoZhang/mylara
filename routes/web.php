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
Route::get('testSetSession', 'Session\SessionController@testSetSession');
Route::get('testGetSessionVal', 'Session\SessionController@testGetSessionVal');
Route::get('testDelSession', 'Session\SessionController@testDelSession');
//Route::get('saying', 'TestController@testByeController');

//array
Route::get('testArrayChangeKeyCase', 'FunctionController\ArrayFunctionController@testArrayChangeKeyCase');
Route::get('testArrayChunk', 'FunctionController\ArrayFunctionController@testArrayChunk');
Route::get('testArrayColumn', 'FunctionController\ArrayFunctionController@testArrayColumn');
Route::get('testArrayCombine', 'FunctionController\ArrayFunctionController@testArrayCombine');
Route::get('testArrayCountValues', 'FunctionController\ArrayFunctionController@testArrayCountValues');
Route::get('testArrayDiff', 'FunctionController\ArrayFunctionController@testArrayDiff');
Route::get('testArrayDiffAssoc', 'FunctionController\ArrayFunctionController@testArrayDiffAssoc');
Route::get('testArrayDiffKey', 'FunctionController\ArrayFunctionController@testArrayDiffKey');
Route::get('testArrayDiffUassoc', 'FunctionController\ArrayFunctionController@testArrayDiffUassoc');
Route::get('testArrayDiffUkey', 'FunctionController\ArrayFunctionController@testArrayDiffUkey');
Route::get('testArrayFill', 'FunctionController\ArrayFunctionController@testArrayFill');
Route::get('testArrayFillKeys', 'FunctionController\ArrayFunctionController@testArrayFillKeys');
Route::get('testArrayFilter', 'FunctionController\ArrayFunctionController@testArrayFilter');
Route::get('testArrayFlip', 'FunctionController\ArrayFunctionController@testArrayFlip');
Route::get('testArrayIntersect', 'FunctionController\ArrayFunctionController@testArrayIntersect');
Route::get('testArrayIntersectAssoc', 'FunctionController\ArrayFunctionController@testArrayIntersectAssoc');
Route::get('testArrayKeyExists', 'FunctionController\ArrayFunctionController@testArrayKeyExists');
Route::get('testArrayKeys', 'FunctionController\ArrayFunctionController@testArrayKeys');
Route::get('testArrayMap', 'FunctionController\ArrayFunctionController@testArrayMap');
Route::get('testArrayMerge', 'FunctionController\ArrayFunctionController@testArrayMerge');
Route::get('testArrayMergeRecursive', 'FunctionController\ArrayFunctionController@testArrayMergeRecursive');
Route::get('testArrayMultisort', 'FunctionController\ArrayFunctionController@testArrayMultisort');
Route::get('testArrayPad', 'FunctionController\ArrayFunctionController@testArrayPad');
Route::get('testArrayPop', 'FunctionController\ArrayFunctionController@testArrayPop');
Route::get('testArrayProduct', 'FunctionController\ArrayFunctionController@testArrayProduct');
Route::get('testArrayPust', 'FunctionController\ArrayFunctionController@testArrayPust');
Route::get('testArrayRand', 'FunctionController\ArrayFunctionController@testArrayRand');
Route::get('testArrayReduce', 'FunctionController\ArrayFunctionController@testArrayReduce');
Route::get('testArrayReplace', 'FunctionController\ArrayFunctionController@testArrayReplace');





Route::get('testExtract', 'FunctionController\OtherFuncController@testExtract');
<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/inventaris/{id}','\App\Http\Controllers\Apis\InventarisController@index')->name('apis.inventaris');

Route::get('/inventaris','\App\Http\Controllers\Apis\InventarisController@cat')->name('apis.inventaris_list');


Route::get('/inventaris/jenis/{id}','\App\Http\Controllers\Apis\InventarisController@jenis')->name('apis.inventaris_jenis');

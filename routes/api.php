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
|/
*/



Route::prefix('notes')->group(function () {
    Route::get('/', 'NotesController@index');
    Route::post('/', 'NotesController@save');
    Route::get('/{id}', 'NotesController@view');
    Route::post('/{id}', 'NotesController@update');
    Route::delete('/{id}', 'NotesController@delete');
});
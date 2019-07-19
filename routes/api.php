<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes PRUEBA MERQUEO
|--------------------------------------------------------------------------
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group(['prefix' => 'products'], function(){

    Route::get('all', function(){ return response()->json(['data' => 'demo']); });

});
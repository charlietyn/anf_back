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

       Route::group(['prefix'=>'admin','middleware' => []],function () {
               Route::get('/', function (){
                   return ["message"=>"admin"];
               });


        /*Datos*/
               Route::post('datos/validate', 'DatosController@validate_model');
               Route::post('datos/update_multiple', 'DatosController@update_multiple');
               Route::get('datos/info', 'DatosController@info');
               Route::delete('datos/delete_by_id', 'DatosController@deletebyid');
               Route::resource('datos', 'DatosController');


    });

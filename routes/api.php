<?php

use App\Http\Controllers\EmployeesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/employees')->group( function(){
    // Route::apiResource("/video",'\App\Http\Controllers\EmployeesController@show');
    Route::post('add', '\App\Http\Controllers\EmployeesController@store');
    Route::get('view', '\App\Http\Controllers\EmployeesController@show');
    // Route::get('view', 'EmployeesController@show');
    Route::patch('update', 'EmployeesController@update');
    Route::delete('delete', 'EmployeesController@destroy');
});

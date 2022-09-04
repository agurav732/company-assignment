<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get_departments', 'DepartmentController@get_departments');
Route::resource('departments',DepartmentApiController::class);
Route::resource('employee',EmployeeApiController::class);
Route::post('add_department', 'DepartmentController@add_department');
// Route::get('delete_departments', 'DepartmentController@get_departments');
// Route::get('delete_departments', 'DepartmentController@get_departments');

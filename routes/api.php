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


Route::resource('/units', 'UnitController');//->middleware('validate:\App\Unit');
Route::resource('/products', 'ProductController');
Route::resource('/unit-conversions', 'UnitConversionController');
Route::resource('/recipes', 'RecipeController');
Route::resource('/users', 'Auth\UserController');

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

Route::get("/login","ApiControllers\Auth\LoginController@login");
Route::resource("records","ApiControllers\RecordController");
Route::resource("projects","ApiControllers\ProjectController");
Route::resource("entries","ApiControllers\EntryController");
Route::get("users","ApiControllers\Auth\UserController");


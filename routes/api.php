<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => ''], function () {
    // List Movies
    Route::get('/movies', 'App\Http\Controllers\MovieController@index');

    // Get Movie by ID
    Route::get('/movies/{movie_id}', 'App\Http\Controllers\MovieController@show');

    // Create a Movie
    Route::post('/movies', 'App\Http\Controllers\MovieController@store');

    // Update a Movie
    Route::put('/movies/{movie_id}', 'App\Http\Controllers\MovieController@update');

    // Delete a Movie
    Route::delete('/movies/{movie_id}', 'App\Http\Controllers\MovieController@destroy');
});
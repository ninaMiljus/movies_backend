<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\LoginController;
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

Route::middleware('api')->get('/movies', [MovieController::class, 'index']);

Route::middleware('api')->get('/movies/{id}', [MovieController::class, 'show']);

Route::middleware('api')->post('/movies', [MovieController::class, 'store']);

Route::middleware('api')->delete('/movies/{id}', [MovieController::class, 'destroy']);

Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware('jwt')->get('/getUser', [LoginController::class, 'getUser']);



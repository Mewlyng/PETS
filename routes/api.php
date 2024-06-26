<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\HistoriesController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/pets', [PetController::class, 'create']);
Route::get('/pets/{id}', [PetController::class, 'get']);
Route::patch('/pets/{id}', [PetController::class, 'update']);
Route::put('/pets/{id}', [PetController::class, 'put']);
Route::delete('/pets/{id}', [PetController::class, 'delete']);
Route::get('histories/{id}', [HistoriesController::class, 'get']);
Route::put('histories/{id}', [HistoriesController::class, 'put']);
Route::patch('histories/{id}', [HistoriesController::class, 'update']);  // Utiliza PATCH para la actualización parcial
Route::delete('histories/{id}', [HistoriesController::class, 'delete']);
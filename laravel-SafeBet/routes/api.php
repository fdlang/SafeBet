<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TorneoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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


Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    // Favoritos
    Route::apiResource('/favoritos', FavoritoController::class);    
    Route::delete('favoritos/{id}', [FavoritoController::class, 'destroy']);

    // Partidos
    Route::get('/partidos', [FavoritoController::class, 'show']);
});

Route::apiResource('/tour', TourController::class);
Route::apiResource('/torneos', TorneoController::class)->only(['index','store','destroy']);
Route::get('/partido/{idTorneo}', [PartidoController::class, 'index']);

// Autentificacion
Route::post('/registro', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
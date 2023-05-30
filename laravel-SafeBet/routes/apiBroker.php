<?php

use App\Http\Controllers\ApiBroker\CasaApuestaApiBrokerController;
use App\Http\Controllers\ApiBroker\TorneoApiBrokerController;
use App\Http\Controllers\PartidoController;
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


Route::prefix('apiBrokerTennis')->group(function(){
    Route::get('getTennisTorneo',[TorneoApiBrokerController::class,'getTennisTorneo']);
    Route::post('getTennisPartido',[PartidoController::class,'index']);
});



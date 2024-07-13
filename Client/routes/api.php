<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TreinoController;
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

Route::group([
    "middleware" => ["jwt.auth"]
], function(){

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/logout',[AuthController::class,'logout']);

    Route::put('treino',[TreinoController::class,'putTreino']);
    Route::get('treino',[TreinoController::class,'getTreino']);
    Route::delete('treino',[TreinoController::class,"deleteTabela"]);
    
});


Route::post('login',[AuthController::class,'login']);
Route::post('registrar',[AuthController::class,'criarConta']);



<?php

use App\Http\Controllers\ComandaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ComandaProdutoController;
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

Route::apiResource('comanda', ComandaController::class);
Route::apiResource('produto', ProdutoController::class);
Route::apiResource('comanda-produto', ComandaProdutoController::class);




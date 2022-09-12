<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;

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

Route::controller(FormularioController::class)->group(function () {
    Route::get('/traerItems', 'traerItems');
    Route::get('/traerMetodosFormulario1', 'traerMetodosFormulario1');
    Route::get('/traerCategorias', 'traerCategorias');
    Route::post('/returnRequest', 'returnRequest');
});

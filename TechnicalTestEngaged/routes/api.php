<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ChessAttackController;
use App\Http\Controllers\API\StringValueController;

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
Route::prefix('v1')->group(function () {

    // Problem 1: Chess Attack
    Route::post('/problem-1', [ChessAttackController::class, 'queensAttack']);

    // Problem 2: String Value
    Route::post('/problem-2', [StringValueController::class, 'maxStringValue']);

});
//Route for testing
Route::get('/test', function () {
    return response()->json(['message' => 'API funcionando']);
});

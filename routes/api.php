<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SalesController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('sales', [SalesController::class, 'index']);
Route::post('sales', [SalesController::class, 'store']);
Route::get('sales/{id}', [SalesController::class, 'show']);
Route::get('sales/{id}/edit', [SalesController::class, 'edit']);
Route::put('sales/{id}/edit', [SalesController::class, 'update']);
Route::delete('sales/{id}/delete', [SalesController::class, 'destroy']);




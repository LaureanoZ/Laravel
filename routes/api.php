<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('services', [\App\Http\Controllers\API\ServicesAdminController::class, 'index'])
    ->middleware(['auth']);
Route::get('services/{id}', [\App\Http\Controllers\API\ServicesAdminController::class, 'view'])
    ->middleware(['auth']);

Route::post('services', [\App\Http\Controllers\API\ServicesAdminController::class, 'create'])
    ->middleware(['auth']);
Route::put('services/{id}', [\App\Http\Controllers\API\ServicesAdminController::class, 'edit'])
    ->middleware(['auth']);
Route::delete('services/{id}', [\App\Http\Controllers\API\ServicesAdminController::class, 'delete'])
    ->middleware(['auth']);
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\PostController;
use App\Http\Controllers\GwaController;
use App\Http\Controllers\SubjectController;

Route::apiResource('subjects', SubjectController::class);

Route::prefix('v1')->group(function () {
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/students', [GwaController::class, 'store']);
Route::put('/students/{id}', [GwaController::class, 'update']);
Route::get('/students/{id}', [GwaController::class, 'show']);
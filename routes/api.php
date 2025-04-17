<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\WeaponCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

//Public routes

Route::prefix('api')->group(function () {
    Route::get('/items', [ItemController::class, 'index']);
    Route::get('/items/search/{name}', [ItemController::class, 'search']);
    Route::get('/items/{id}', [ItemController::class, 'show']);

    Route::get('/weapon-categories', [WeaponCategoryController::class, 'index']);
    Route::get('/weapon-categories/search/{name}', [WeaponCategoryController::class, 'search']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/item/add', [ItemController::class, 'store']);
    Route::put('/items/update/{id}', [ItemController::class, 'update']);
    Route::delete('/item/delete/{id}', [ItemController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

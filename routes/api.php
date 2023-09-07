<?php

use App\Http\Controllers\{
    AuthController,
    ComicController,
    PublisherController,
    TypeComicController,
    UserController
};
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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/cadastrar', [UserController::class, 'create']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'user']);
        Route::put('/editar', [UserController::class, 'edit']);
        Route::delete('/deletar', [UserController::class, 'destroy']);
    });

    Route::prefix('editora')->group(function () {
        Route::post('/cadastrar', [PublisherController::class, 'create']);
        Route::get('/', [PublisherController::class, 'list']);
    });

    Route::prefix('tipo_hq')->group(function () {
        Route::post('/cadastrar', [TypeComicController::class, 'create']);
        Route::get('/', [TypeComicController::class, 'list']);
    });

    Route::prefix('hq')->group(function () {
        Route::post('/cadastrar', [ComicController::class, 'create']);
        Route::get('/', [ComicController::class, 'list']);
    });
});

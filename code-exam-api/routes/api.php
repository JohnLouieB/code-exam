<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\articleController;

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
Route::get('/articles', [articleController::class, 'index']);
Route::post('/insert-article', [articleController::class, 'create']);
Route::get('/article-details/{id}', [articleController::class, 'retrieveArticleById']);
Route::post('/edit-article', [articleController::class, 'update']);
Route::delete('/delete-article/{id}', [articleController::class, 'destroy']);

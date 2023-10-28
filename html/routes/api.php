<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Domains\Post\Http\PostController;

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

/**
 * TODO add extra middleware laag ???
 */

Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store']);

Route::resource('posts', PostController::class)
    ->only(['index', 'store'])
    ->except(['delete'])
    ->middleware('auth:sanctum');

Route::get('/health', function () {
    return 'hello';
});

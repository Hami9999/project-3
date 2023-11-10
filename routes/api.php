<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ImageController;
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

Route::middleware(['auth:api'])->group(function () {
    /*book routes */
    Route::post('add-book',[BookController::class, 'store']);
    Route::get('books',[BookController::class, 'index']);
    Route::get('book/{book}',[BookController::class, 'show']);
    Route::put('update-book/{book}',[BookController::class, 'updateBook']);
    Route::delete('delete-book/{book}',[BookController::class, 'destroy']);
    /*image routes */
    Route::post('image',[ImageController::class, 'store']);
    Route::post('update-image',[ImageController::class, 'updateImage']);
    Route::delete('delete-image/{image}',[ImageController::class, 'deleteImage']);
    /*events routes*/
    Route::get('events',[EventsController::class, 'index']);
    Route::post('add-event',[EventsController::class, 'store']);
    Route::get('event/{event}',[EventsController::class, 'show']);
    Route::put('update-event/{event}',[EventsController::class, 'updateEvent']);
    Route::delete('delete-event/{event}',[EventsController::class, 'destroy']);
});
Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);
Route::post('refresh',[AuthController::class, 'refresh']);
Route::post('logout',[AuthController::class, 'logout']);
Route::post('forgetPassword',[AuthController::class, 'forgetPassword']);
Route::post('reset-password', [AuthController::class, 'submitResetPasswordForm']);



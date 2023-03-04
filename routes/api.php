<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\HydraController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
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

//use the middleware 'hydra.log' with any request to get the detailed headers, request parameters and response logged in logs/laravel.log

Route::get('hydra', [HydraController::class, 'hydra']);
Route::get('hydra/version', [HydraController::class, 'version']);

Route::apiResource('users', UserController::class)->except(['edit', 'create', 'store', 'update', 'delete'])->middleware(['auth:sanctum', 'ability:admin,super-admin']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
Route::post('users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
Route::patch('users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
Route::delete('users/{user}', [UserController::class, 'destroy'])->middleware(['auth:sanctum', 'ability:admin,super-admin']);
Route::get('me', [UserController::class, 'me'])->middleware('auth:sanctum');
Route::post('login', [UserController::class, 'login']);

Route::apiResource('roles', RoleController::class)->except(['create', 'edit'])->middleware(['auth:sanctum', 'ability:admin,super-admin,user']);
Route::apiResource('users.roles', UserRoleController::class)->except(['create', 'edit', 'show', 'update'])->middleware(['auth:sanctum', 'ability:admin,super-admin']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Location
    Route::get('locations', [LocationController::class, 'index']);
    Route::get('locations/{id}', [LocationController::class, 'show']);
    Route::post('locations', [LocationController::class, 'store']);
    Route::put('locations/{id}', [LocationController::class, 'update']);
    Route::delete('locations/{id}', [LocationController::class, 'destroy']);

    // Region
    Route::get('regions', [RegionController::class, 'index']);
    Route::get('regions/{id}', [RegionController::class, 'show']);
    Route::post('regions', [RegionController::class, 'store']);
    Route::put('regions/{id}', [RegionController::class, 'update']);
    Route::delete('regions/{id}', [RegionController::class, 'destroy']);

    // Accommodation
    Route::get('accommodations', [AccommodationController::class, 'index']);
    Route::get('accommodations/{id}', [AccommodationController::class, 'show']);
    Route::post('accommodations', [AccommodationController::class, 'store']);
    Route::put('accommodations/{id}', [AccommodationController::class, 'update']);
    Route::delete('accommodations/{id}', [AccommodationController::class, 'destroy']);

    // Room
    Route::get('rooms', [RoomController::class, 'index']);
    Route::get('rooms/{id}', [RoomController::class, 'show']);
    Route::post('rooms', [RoomController::class, 'store']);
    Route::put('rooms/{id}', [RoomController::class, 'update']);
    Route::delete('rooms/{id}', [RoomController::class, 'destroy']);

    // Reservation
    Route::get('reservations', [ReservationController::class, 'index']);
    Route::get('reservations/{id}', [ReservationController::class, 'show']);
    Route::post('reservations', [ReservationController::class, 'store']);
    Route::put('reservations/{id}', [ReservationController::class, 'update']);
    Route::delete('reservations/{id}', [ReservationController::class, 'destroy']);
});

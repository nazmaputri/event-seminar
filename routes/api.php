<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CertificateController;

    Route::post('register', [RegisterController::class,'register']);
    Route::post('login', [LoginController::class,'login']);
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/dashboard/data', [DashboardController::class, 'dashboard']);
    });
    
    
    //Logout
    Route::middleware('auth')->post('/logout', [LoginController::class, 'logout']);

    // Halaman Event
        Route::get('events', [EventController::class, 'index']);
        Route::post('events', [EventController::class, 'store']);
        Route::get('events/{id}', [EventController::class, 'show']);
        Route::put('eventsupdate/{id}', [EventController::class, 'update']);
        Route::delete('events/{id}', [EventController::class, 'destroy']);

    //Sertifikat
    Route::get('/certificates/{userId}', [CertificateController::class, 'generateCertificate']);
    

    // //Permissions
    // Route::group(['prefix' => 'admin', 'middleware' => ['auth:api']], function() {
    //     Route::get('permissions', [PermissionController::class, 'index']);
    //     Route::get('permissions/all', [PermissionController::class, 'all']);
    //     Route::post('permissions', [PermissionController::class, 'store']);
    //     Route::put('permissions/{permission}', [PermissionController::class, 'update']);
    //     Route::delete('permissions/{permission}', [PermissionController::class, 'destroy']);
    // });

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

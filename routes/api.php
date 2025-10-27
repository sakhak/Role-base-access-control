<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/test', function (Request $request) {
//     return response()->json(['user' => $request->user()]);
// });


Route::prefix( '/auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);


    Route::middleware('auth:sanctum')->group(function () {

        Route::put('users/{id}', [AuthController::class, 'update']);
        Route::get('show/{id}', [AuthController::class, 'show']);
        Route::delete('delete/{id}', [AuthController::class, 'destroy']);
        Route::get('index', [AuthController::class, 'index']);
        Route::post('logout', [AuthController::class, 'logout']);
        // Route::get('me', [AuthController::class, 'me']);
    });
});
// Route::middleware(['auth:sanctum', 'role:super_admin'])->group(function () {
//     Route::get('/superadmin-only', function () {
//         return response()->json(['message' => 'SuperAdmin access granted']);
//     });
// });

// Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
//     Route::get('/admin-only', function () {
//         return response()->json(['message' => 'Admin access granted']);
//     });
// });

// Route::middleware(['auth:sanctum', 'role:teacher'])->group(function () {
//     Route::get('/teacher-only', function () {
//         return response()->json(['message' => 'Teacher access granted']);
//     });
// });

// Route::middleware(['auth:sanctum', 'role:student'])->group(function () {
//     Route::get('/student-only', function () {
//         return response()->json(['message' => 'Student access granted']);
//     });
//  });
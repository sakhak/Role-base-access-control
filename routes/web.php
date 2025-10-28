<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');



// =============================== For Role ===============================





Route::middleware('can:user.index')->group(function(){
    Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
    Route::get('/users', [UserController::class, 'index'])->name('user.index');


    Route::post('role/create', [RoleController::class, 'create'])->name('role.create');
    Route::get('role/show', [RoleController::class, 'showcreate'])->name('role.showcreate');
    Route::get('role/{id}/update', [RoleController::class, 'update'])->name('role.update');


    // =============================== for Permissiono ==================================


    Route::get('/permissions', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permissions/{id}/show', [PermissionController::class, 'show'])->name('permission.show');

    Route::put('/permissions/{id}/update', [PermissionController::class, 'update'])->name('permission.update');

});




// 

Route::prefix('/auth')->group(function (){
    Route::get('login', [AuthenticationController::class, 'login'])->name('auth.login');
    Route::post('login', [AuthenticationController::class, 'loginProcess'])->name('auth.login-process');

    Route::get('register', [AuthenticationController::class, 'register'])->name('auth.regster');
    Route::post('register', [AuthenticationController::class, 'registerProcess'])->name('auth.regster-process');
});

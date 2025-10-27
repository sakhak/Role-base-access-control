<?php

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

Route::get('/users', [UserController::class, 'index'])->name('user.index');

// =============================== For Role ===============================

Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
Route::post('role/create', [RoleController::class, 'create'])->name('role.create');
Route::get('role/show', [RoleController::class, 'showcreate'])->name('role.showcreate');
Route::get('role/{id}/update', [RoleController::class, 'update'])->name('role.update');


// =============================== for Permissiono ==================================


Route::get('/permissions', [PermissionController::class, 'index'])->name('permission.index');
Route::get('/permissions/{id}/show', [PermissionController::class, 'show'])->name('permission.show');

Route::put('/permissions/{id}/update', [PermissionController::class, 'update'])->name('permission.update');



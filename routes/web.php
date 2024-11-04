<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthController::class, 'loginView'])->name('login');
Route::post('login-post', [AuthController::class, 'login'])->name('login.post');
Route::get('/login/captcha', [AuthController::class, 'refreshCaptcha'])->name('login.captcha');

Route::middleware([Auth::class])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('layout', LayoutController::class)->except(['show', 'destroy']);

    //COMPONENTS
    Route::get('/pagination/{view}/{link}/{url}/{home}', [ComponentController::class, 'pagination'])->name('pagination'); // PAGINATION
    Route::get('/search/{url}', [ComponentController::class, 'search'])->name('search');


    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


    // Users
    Route::resource('users', UsersController::class)->except(['show']);
    Route::get('profile', [UsersController::class, 'profile'])->name('profile');
    Route::post('profile/{id}', [UsersController::class, 'updateProfile'])->name('update.profile');
    Route::get('users/pdf', [UsersController::class, 'pdf'])->name('users.pdf');
    Route::get('users/excel', [UsersController::class, 'excel'])->name('users.excel');
    Route::get('users/destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy');


    // Log Aktivitas
    Route::get('log', [LogController::class, 'index'])->name('log');
    Route::get('log/pdf', [LogController::class, 'pdf'])->name('log.pdf');
    Route::get('log/excel', [LogController::class, 'excel'])->name('log.excel');


    // Role
    Route::resource('role', RoleController::class);
});

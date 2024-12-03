<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\RecognitionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Auth;
use App\Http\Middleware\Dashboard;
use App\Http\Middleware\Layout;
use App\Http\Middleware\Log;
use App\Http\Middleware\Role;
use App\Http\Middleware\Users;
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthController::class, 'loginView'])->name('login');
Route::post('login-post', [AuthController::class, 'login'])->name('login.post');
Route::post('login-face', [AuthController::class, 'loginWithFace'])->name('login.face');
Route::post('login-token', [AuthController::class, 'loginWithToken'])->name('login.token');
Route::get('/login/captcha', [AuthController::class, 'refreshCaptcha'])->name('login.captcha');

Route::get('test', [AuthController::class, 'test']);

Route::middleware([Auth::class])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('not-found', [AuthController::class, 'error404'])->name('error.404');

    // Profile
    Route::get('profile', [UsersController::class, 'profile'])->name('profile');
    Route::post('profile/{id}', [UsersController::class, 'updateProfile'])->name('update.profile');

    // Components
    Route::get('/pagination/{view}/{link}/{url}/{home}', [ComponentController::class, 'pagination'])->name('pagination'); // PAGINATION
    Route::get('/search/{url}', [ComponentController::class, 'search'])->name('search');

    // Design Layout
    Route::resource('layout', LayoutController::class)->except(['show', 'destroy'])->middleware(Layout::class);

    // Recognition
    Route::get('recognition', [RecognitionController::class, 'index'])->name('recognition');
    Route::post('recognition/update/{id}', [RecognitionController::class, 'update'])->name('recog.update');


    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware(Dashboard::class);

    // Users
    Route::middleware([Users::class])->group(function () {
        Route::resource('users', UsersController::class)->except(['show', 'destroy']);
        Route::get('users/token/{id}', [UsersController::class, 'getToken'])->name('users.getToken');
        Route::get('users/pdf', [UsersController::class, 'pdf'])->name('users.pdf');
        Route::get('users/excel', [UsersController::class, 'excel'])->name('users.excel');
        Route::get('users/destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
    });

    // Log Aktivitas
    Route::middleware([Log::class])->group(function () {
        Route::get('log', [LogController::class, 'index'])->name('log');
        Route::get('log/pdf', [LogController::class, 'pdf'])->name('log.pdf');
        Route::get('log/excel', [LogController::class, 'excel'])->name('log.excel');
    });

    // Role
    Route::resource('role', RoleController::class)->middleware(Role::class);
    Route::get('role/setting-face/{id}', [RoleController::class, 'face'])->name('role.face');
});

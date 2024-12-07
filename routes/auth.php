<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});


Route::group(['middleware' => ['auth', 'restrict.role:Admin'], 'prefix' => 'admin'], function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'adminindex'])->name('Dashboard.admin)');


    // Route::get('/dashboard', [AdminController::class, 'index']);
    // Route::get('/Users', [UserController::class, 'index']);

    // Route::get('/Roles', [UserController::class, 'index'])->name('Roles.index');

    // Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    // Route::post('register', [RegisteredUserController::class, 'store']);

    // Insert here Admin routes
    Route::get('/Users', [UserController::class, 'index'])->name('Users.index');
    Route::get('/Users/create', [UserController::class, 'create'])->name('Users.create');
    Route::post('/Users/store', [UserController::class, 'store'])->name('Users.store');
    Route::get('/Users/{id}', [UserController::class, 'show'])->name('Users.show');
    Route::get('/Users/{id}/edit', [UserController::class, 'edit'])->name('Users.edit');
    Route::post('/Users/{id}', [UserController::class, 'update'])->name('Users.update');
    Route::delete('/Users/{id}', [UserController::class, 'destroy'])->name('Users.destroy');
});

Route::group(['middleware' => ['auth', 'restrict.role:Student'], 'prefix' => 'student'], function () {
    // Insert here Student routes
    Route::get('/student/dashboard', [DashboardController::class, 'studentindex'])->name('Dashboard.student)');
});

Route::group(['middleware' => ['auth', 'restrict.role:Pilot'], 'prefix' => 'pilot'], function () {
    // Insert here Pilot routes    
    Route::get('/pilote/dashboard', [DashboardController::class, 'studentindex'])->name('Dashboard.pilot)');
});

Route::group(['middleware' => ['auth', 'restrict.role:Company'], 'prefix' => 'company'], function () {
    // Insert here Company routes
    Route::get('/company/dashboard', [DashboardController::class, 'studentindex'])->name('Dashboard.company)');
});

<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('auth')->group(function () {
    Route::get('portal', function () {
        return "Olá Mundo";
    });

    /**Route::get('/newtestdrive', function () {
        return Inertia::render('portaelnpveiculos/exemplo/ExemploForm');
    })->name('home');
     * **/

    Route::get('/newtestdrive', [\App\Http\Controllers\TestDriveController::class, 'create'])->name('registerTestDrive');
    Route::post('/newtestdrive', [\App\Http\Controllers\TestDriveController::class, 'store'])->name('storeTestDrive');

    Route::get('/testeapi', [\App\Http\Controllers\TestUsoAPI::class, 'index'])->name('testeapi');
});

<?php

use App\Http\Controllers\FrontEnd\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FrontEnd\Auth\ConfirmablePasswordController;
use App\Http\Controllers\FrontEnd\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\FrontEnd\Auth\EmailVerificationPromptController;
use App\Http\Controllers\FrontEnd\Auth\NewPasswordController;
use App\Http\Controllers\FrontEnd\Auth\PasswordResetLinkController;
use App\Http\Controllers\FrontEnd\Auth\RegisteredUserController;
use App\Http\Controllers\FrontEnd\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest:frontend')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest:frontend');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest:frontend')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest:frontend');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest:frontend')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest:frontend')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest:frontend')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest:frontend')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('frontend')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['frontend', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['frontend', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('frontend')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('frontend');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('frontend')
                ->name('logout');

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
use Illuminate\Support\Facades\Route;
use App\Models\kn_tekstas_eil;
use App\Http\Controllers\LexemeController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
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
    Route::get('/zodziai', [WordController::class, 'getAll'] )->name('zodziai');
    Route::get('zodziai.getWords', [WordController::class, 'getWords'] )->name('zodziai.getWords');
    Route::get('zodziai.search', [WordController::class, 'searchWords'] )->name('zodziai.search');
    Route::get('/leksemos', [LexemeController::class, 'getAll'] );
    Route::get('leksemos.getLexemes', [LexemeController::class, 'getLexemes'] ) ->name('leksemos.getLexemes');
    Route::get('leksemos.search', [LexemeController::class, 'searchLexemes'] )->name('leksemos.search');
    Route::get('/', [ReadingController::class, 'getAll']);
    Route::post('/', [ReadingController::class, 'searchScope']);

    Route::get('/skaitymas2', function () {
        $lines = kn_tekstas_eil::all();
        $grouped= $lines->groupBy('puslapis');
        return view('skaitymasTemp', [
            'heading' => 'zodziai',
            'lines' => $grouped->all()
        ]);
    });
    Route::get('/users', [UserController::class, 'getUsers']) -> name('users.getUsers');
    Route::delete('/users', [UserController::class, 'deleteUser']) -> name('users.deleteUser');
});

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\LexemeController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\WordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Menu', [
        'canLogin' => Route::has('login'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/about', function () {
    return Inertia::render('About', [
        'canLogin' => Route::has('login'),
    ]);
})->name('about');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/lexemes', [LexemeController::class, 'getAll'])->name('lexemes');
    Route::get('/words', [WordController::class, 'getAll'])->name('words');
    Route::get('/reading', [ReadingController::class, 'getAll'])->name('reading');
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->middleware(['auth', 'verified'])->name('users')->can('Admin');
    Route::get('/kaitymas', [WordController::class, 'getKaitymas'])->name('kaitymas');
});



require __DIR__.'/auth.php';

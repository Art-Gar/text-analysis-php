<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\kn_tekstas_eil;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
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
//    error_log($grouped->all()[0][2]['eilutes']);
    return view('skaitymasTemp', [
        'heading' => 'zodziai',
        'lines' => $grouped->all()
    ]);
});
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

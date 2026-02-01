<?php

use App\Article\Http\Web\Controllers\ArticleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('index');

Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    // Route::get('/{article}', [ArticleController::class, 'show'])->name('show');
    Route::get('/create', [ArticleController::class, 'create'])->name('create');
});
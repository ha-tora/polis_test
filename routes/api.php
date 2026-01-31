<?php

use App\Article\Http\API\Controllers\ArticleController;
use App\Article\Http\API\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::prefix('articles')->name('articles.')->group(function () {
   Route::get('/', [ArticleController::class, 'index'])->name('index');
   Route::get('/{article}', [ArticleController::class, 'show'])->name('show');
   Route::post('/', [ArticleController::class, 'store'])->name('store');

   Route::post('/{article}/comments', [CommentController::class, 'store'])->name('comments.store');
});
<?php

use App\Article\Http\API\Controllers\CommentController;
use App\Article\Http\API\Resources\ArticleCollection;
use Illuminate\Support\Facades\Route;

Route::prefix('articles')->name('articles.')->group(function () {
   Route::get('/', [ArticleCollection::class, 'index'])->name('index');
   Route::get('/{article}', [ArticleCollection::class, 'show'])->name('show');
   Route::post('/', [ArticleCollection::class, 'store'])->name('store');

   Route::post('/{article}/comments', [CommentController::class, 'store'])->name('comments.store');
});
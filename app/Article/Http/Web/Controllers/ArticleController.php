<?php

namespace App\Article\Http\Web\Controllers;

use App\Article\Models\Article;
use App\Article\Services\ArticleService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ArticleController
{
    public function __construct(
        private ArticleService $articleService
    ) {}

    public function index(Request $request)
    {
        return Inertia::render('Articles/Index');
    }

    public function show(Article $article, Request $request)
    {
        return Inertia::render('Articles/Show', [
            'article' => $this->articleService->get($article)
        ]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Articles/Create');
    }
}

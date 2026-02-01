<?php

namespace App\Article\Http\Web\Controllers;

use App\Article\Models\Article;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ArticleController
{
    public function index(Request $request)
    {
        return Inertia::render('Articles/Index');
    }

    public function show(Article $article, Request $request)
    {
        return Inertia::render('Articles/Show', ['article' => $article]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Articles/Create');
    }
}

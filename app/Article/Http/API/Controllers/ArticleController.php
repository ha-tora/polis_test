<?php

namespace App\Article\Http\API\Controllers;

use App\Article\Http\API\Requests\Article\StoreArticleRequest;
use App\Article\Http\API\Resources\Article\ArticleCollection;
use App\Article\Http\API\Resources\Article\ArticleResource;
use App\Article\Services\ArticleService;
use App\Article\Models\Article;

class ArticleController
{
    public function __construct(
        private ArticleService $articleService
    ) {}

    public function index()
    {
        $articles = $this->articleService->getAll();

        return response()->success(new ArticleCollection($articles));
    }

    public function show(Article $article)
    {
        $article = $this->articleService->get($article);

        return response()->success(new ArticleResource($article));
    }

    public function store(StoreArticleRequest $request)
    {
        $article = $this->articleService->store($request->validated());

        return response()->success(new ArticleResource($article));
    }
}

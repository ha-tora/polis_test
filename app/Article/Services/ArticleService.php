<?php

namespace App\Article\Services;

use App\Article\Models\Article;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService
{
    public function getAll(): LengthAwarePaginator
    {
        return Article::paginate();
    }

    public function get(Article $article): Article
    {
        return $article->load(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);
    }

    public function store(array $attributes): Article
    {
        return Article::create($attributes);
    }
}

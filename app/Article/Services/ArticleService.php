<?php

namespace App\Article\Services;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService
{
    public function getAll(): LengthAwarePaginator
    {
        return Article::paginate();
    }

    public function get(Article $article): Article
    {
        return $article;
    }

    public function store(array $attributes): Article
    {
        return Article::create($attributes);
    }
}

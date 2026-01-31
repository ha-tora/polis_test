<?php

namespace App\Article\Services;

use App\Article\Models\Comment;
use App\Article\Models\Article;

class CommentService
{
    public function create(Article $article, array $attributes)
    {
        return Comment::create($attributes + ['article_id' => $article->id]);
    }
}

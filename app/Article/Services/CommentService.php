<?php

namespace App\Article\Services;

use App\Article\Models\Comment;

class CommentService
{
    public function create(array $attributes)
    {
        return Comment::create($attributes);
    }
}

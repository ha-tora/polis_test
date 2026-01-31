<?php

namespace App\Article\Http\API\Controllers;

use App\Article\Http\API\Requests\StoreCommentRequest;
use App\Article\Http\API\Resources\Comment\CommentResource;
use App\Article\Services\CommentService;
use App\Article\Models\Article;

class CommentController
{
    public function __construct(
        private CommentService $commentService
    ) {}

    public function store(Article $article, StoreCommentRequest $request)
    {
        $comment = $this->commentService->create($article, $request->validated());

        return response()->success(new CommentResource($comment));
    }
}

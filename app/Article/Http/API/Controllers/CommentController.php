<?php

namespace App\Article\Http\API\Controllers;

use App\Article\Http\API\Requests\StoreCommentRequest;
use App\Article\Http\API\Resources\Comment\CommentResource;
use App\Article\Services\CommentService;

class CommentController
{
    public function __construct(
        private CommentService $commentService
    ) {}

    public function store(StoreCommentRequest $request)
    {
        $comment = $this->commentService->create($request->validated());

        return response()->success(new CommentResource($comment));
    }
}

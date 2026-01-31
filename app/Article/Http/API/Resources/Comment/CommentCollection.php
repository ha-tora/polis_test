<?php

namespace App\Article\Http\API\Resources\Comment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return $this->collection->transform(function ($comment) {
            return [
                'id'            => $comment->id,
                'author_name'   => $comment->author_name,
                'content'       => $comment->content,
                'created_at'    => $comment->created_at
            ];
        })->toArray();
    }
}

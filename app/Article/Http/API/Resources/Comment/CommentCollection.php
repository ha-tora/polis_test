<?php

namespace App\Article\Http\API\Resources\Comment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'author_name'   => $this->author_name,
            'content'       => $this->content,
            'created_at'    => $this->created_at
        ];
    }
}

<?php

namespace App\Article\Http\API\Resources\Article;

use App\Article\Http\API\Resources\Comment\CommentCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'short_content' => $this->content,
            'comments'      => new CommentCollection($this->comments),
            'created_at'    => $this->created_at
        ];
    }
}

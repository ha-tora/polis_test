<?php

namespace App\Article\Http\API\Requests\Comment;

use App\Common\Http\API\Requests\ApiFormRequest;

class StoreCommentRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'article_id'    => ['required', 'exists:articles,id'],
            'author_name'   => ['required', 'string'],
            'content'       => ['required', 'string']
        ];
    }
}

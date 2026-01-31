<?php

namespace App\Article\Http\API\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'article_id'    => ['required', 'exists:article,id'],
            'author_name'   => ['required', 'string'],
            'content'       => ['required', 'string']
        ];
    }
}

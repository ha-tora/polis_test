<?php

namespace App\Article\Http\API\Requests\Article;

use App\Http\Requests\ApiFormRequest;

class StoreArticleRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'title'     => ['required', 'string'],
            'content'   => ['required', 'string'],
        ];
    }
}

<?php

namespace App\Http\Requests;

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

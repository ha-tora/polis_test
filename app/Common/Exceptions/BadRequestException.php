<?php

namespace App\Common\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BadRequestException extends Exception
{
    public function __construct(
        public mixed $data = []
    ) {}

    public function render(Request $request): JsonResponse
    {
        return response()->error(
            $this->data,
            422,
            'Bad Request'
        );
    }
}

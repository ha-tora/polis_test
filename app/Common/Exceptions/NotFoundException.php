<?php

namespace App\Common\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotFoundException extends Exception
{
    public function __construct(
        public mixed $data = []
    ) {}

    public function render(Request $request): Response
    {
        return response()->error(
            $this->data,
            404,
            'Not Found'
        );
    }
}

<?php

namespace App\Http\Requests;

use App\Common\Exceptions\BadRequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function failedValidation(Validator $validator)
    {
        throw new BadRequestException($validator->errors()->toArray());
    }
}

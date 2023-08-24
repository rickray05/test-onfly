<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

abstract class AbstractFormRequest extends FormRequest
{
    abstract public function rules();

    abstract public function authorize();

    protected function failedAuthorization(){
        throw new HttpResponseException(
            response()->json('The user not exists', 401)
        );
    }

    protected function failedValidation(Validator $validator){
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
          response()->json([
              'message' => 'errors',
              $errors
          ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBootcampRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required",
            "description" => "required",
            "website" => "required|URL",
            "phone" => "required|numeric",
            "bootcamp_id" => "required|exists:users,id",
            "average_rating" => "required",
            "average_cost" => "required|integer"
        ];
    }

    //metodo para enviar response de error
    protected function failedValidation(Validator $v){
        throw new HttpResponseException(
            response()->json(["success" => false, "errors" => $v->errors() ],422)
        );

    }

}

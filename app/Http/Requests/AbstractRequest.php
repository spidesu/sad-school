<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractRequest extends FormRequest
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

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно к заполнению',
            'max' => 'Значение поля :attribute должно быть не больше :max',
            'integer' => 'Значение поля :attribute должно быть числом',
        ];
    }

    abstract public function rules();

    public function failedValidation(Validator $validator)
    {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }
}

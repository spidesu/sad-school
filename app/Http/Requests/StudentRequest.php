<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends AbstractRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            [
                'last_name' => 'required|max:100',
                'first_name' => 'required|max:100',
                'middle_name' => 'required|max:100',
                'gender_id' => 'integer',
                'birth_date' => 'date',
                'health_group_id' => 'integer',
                'medical_doc_fact' => 'boolean',
                'address_reg' => 'max:500',
                'address_act' => 'max:500',
                //'group_ids' => 'array',
                //'representative_ids' => 'array'
            ]
        ];
    }
}

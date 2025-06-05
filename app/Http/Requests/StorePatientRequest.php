<?php

namespace App\Http\Requests;

use App\Models\Patient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePatientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('patient_create');
    }

    public function rules()
    {
        return [
            'fullname' => [
                'string',
                'required',
            ],
            'father' => [
                'string',
                'nullable',
            ],
            'mother' => [
                'string',
                'nullable',
            ],
            'birthdate' => [
                'date',
                'nullable',
            ],
            'gender' => [
                'string',
                'nullable',
                'in:male,female,other',
            ],
            'marital_status' => [
                'string',
                'nullable',
                'in:single,married,divorced,widowed',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'mobile' => [
                'string',
                'nullable',
            ],
            'workplace' => [
                'string',
                'nullable',
            ],
            'national_id' => [
                'string',
                'nullable',
            ],
            'medical_history' => [
                'string',
                'nullable',
            ],
            'photo' => [
                'nullable',
            ],
        ];
    }
} 
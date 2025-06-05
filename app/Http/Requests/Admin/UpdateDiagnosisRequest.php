<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateDiagnosisRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('diagnosis_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'patient_id' => [
                'required',
                'integer',
            ],
            'clinical_examination' => [
                'nullable',
                'string',
            ],
            'abdominal_examination' => [
                'nullable',
                'string',
            ],
            'abdominal_ultrasound' => [
                'nullable',
                'string',
            ],
            'laboratory_tests' => [
                'nullable',
                'string',
            ],
            'upper_endoscopy' => [
                'nullable',
                'string',
            ],
            'lower_endoscopy' => [
                'nullable',
                'string',
            ],
            'diagnosis' => [
                'nullable',
                'string',
            ],
            'follow_up' => [
                'nullable',
                'string',
            ],
            'ercp' => [
                'nullable',
                'string',
            ],
            'chief_complaint' => [
                'nullable',
                'string',
            ],
            'medical_history' => [
                'nullable',
                'string',
            ],
            'further_investigations' => [
                'nullable',
                'string',
            ],
            'treatment' => [
                'nullable',
                'string',
            ],
            'notes' => [
                'nullable',
                'string',
            ],
            'sat' => [
                'nullable',
                'string',
                'max:255',
            ],
            'rr' => [
                'nullable',
                'string',
                'max:255',
            ],
            'hr' => [
                'nullable',
                'string',
                'max:255',
            ],
            'bp' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }
}

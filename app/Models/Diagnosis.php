<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'clinical_examination',
        'abdominal_examination',
        'abdominal_ultrasound',
        'laboratory_tests',
        'upper_endoscopy',
        'lower_endoscopy',
        'diagnosis',
        'follow_up',
        'ercp',
        'chief_complaint',
        'medical_history',
        'further_investigations',
        'treatment',
        'notes',
        'sat',
        'rr',
        'hr',
        'bp',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}

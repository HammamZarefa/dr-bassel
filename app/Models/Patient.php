<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_number',
        'fullname',
        'father',
        'mother',
        'birthdate',
        'gender',
        'marital_status',
        'phone',
        'mobile',
        'workplace',
        'national_id',
        'medical_history',
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($patient) {
            $patient->patient_number = 'PAT-' . str_pad(static::max('id') + 1, 6, '0', STR_PAD_LEFT);
        });
    }
}

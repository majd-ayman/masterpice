<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'diagnosis',
        'prescription',
        'treatment',
        'record_date',
    ];

    // ✅ علاقة مع المريض (Patient وليس User)
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    // ✅ علاقة مع الطبيب
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}

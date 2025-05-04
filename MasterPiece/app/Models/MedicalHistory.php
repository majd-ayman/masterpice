<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'doctor_id',             
        'appointment_id',       
        'chronic_diseases',
        'current_medications',
        'allergies',
        'past_surgeries',
        'is_pregnant',
        'family_history',
        'lifestyle',
        'mental_health_notes',
        'additional_notes',
    ];
    
    public function user()
{
    return $this->belongsTo(User::class);
}

public function doctor()
{
    return $this->belongsTo(Doctor::class);
}

public function appointment()
{
    return $this->belongsTo(Appointment::class);
}

}

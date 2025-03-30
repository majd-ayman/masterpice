<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 
        'doctor_id', 
        'appointment_date', 
        'appointment_time', 
        'status',
    ];

    // علاقة مع المستخدم (المريض)
    public function patient()
{
    return $this->belongsTo(Patient::class, 'patient_id');
}


    // علاقة مع الطبيب
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}

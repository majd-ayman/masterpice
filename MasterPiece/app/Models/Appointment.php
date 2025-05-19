<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    use HasFactory, SoftDeletes; 

    protected $fillable = [
        'user_id', 
        'doctor_id',
        'clinic_id',
        'appointment_date',
        'appointment_time',
        'status',
        'appointment_type',
        'notes',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');  
    }
public function reviews()
{
    return $this->hasMany(Review::class);
}
public function medicalHistories()
{
    return $this->hasMany(MedicalHistory::class);
}
public function medicalRecord()
{
    return $this->hasOne(MedicalRecord::class);
}

}

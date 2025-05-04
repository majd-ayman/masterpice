<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory , SoftDeletes;

    protected $table = 'doctors';

    protected $fillable = [
        'name',
        'phone',
        'user_id',
        'clinic_id',
        'department_id', 
        'specialty',
        'available_from',
        'available_to',
        'description',
        'skills',
        'educational_qualifications',
        'image',
        'experience',
        'working_days',
        'profile_picture',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'appointments', 'doctor_id', 'patient_id')
                    ->withPivot('appointment_date')
                    ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function medicalHistories()
{
    return $this->hasMany(MedicalHistory::class);
}

}


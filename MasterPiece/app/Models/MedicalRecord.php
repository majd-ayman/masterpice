<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalRecord extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'user_id',
        'doctor_id',
        'diagnosis',
        'prescription',
        'treatment',
        'record_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function appointment()
{
    return $this->belongsTo(Appointment::class);
}

}

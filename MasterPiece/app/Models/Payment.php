<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient; // تأكد من وجود موديل Patient

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'patient_id',
        'amount',
        'payment_method',
        'payment_status',
        'payment_date',
    ];

    // علاقة مع الموعد
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }

    // علاقة مع المريض (باستخدام موديل Patient)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

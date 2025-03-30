<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'rating',
        'comment',
    ];

    // علاقة مع المريض (يجب أن يكون Patient وليس User)
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    // علاقة مع الطبيب
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    // التحقق من التقييم (بين 1 و 5)
    public static function boot()
    {
        parent::boot();

        static::creating(function ($review) {
            if ($review->rating < 1 || $review->rating > 5) {
                throw new \Exception("التقييم يجب أن يكون بين 1 و 5");
            }
        });
    }
}

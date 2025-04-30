<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'doctor_id',
        'rating',
        'comment',
        'appointment_id'
    ];

    protected $dates = ['deleted_at'];

    // علاقة مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة مع الموعد
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
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

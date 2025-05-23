<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Appointment;
use App\Models\Review;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'gender',
        'profile_picture',
        'age',
        'role', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get all appointments for the doctor.
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'user_id');
    }

    /**
     * Get all reviews for the doctor.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'doctor_id');
    }

    public function doctor()
{
    return $this->hasOne(Doctor::class);
}



public function medicalHistories()
{
    return $this->hasMany(MedicalHistory::class);
}



 
    
}

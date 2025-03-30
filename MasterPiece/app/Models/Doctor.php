<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';

    protected $fillable = [
        'name',
        'phone',
        'user_id',
        'clinic_id',
        'department_id', // تمت الإضافة
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

    // علاقة الطبيب مع الأقسام
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // 🔹 العلاقة مع المرضى (Many-to-Many) عبر appointments
    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'appointments', 'doctor_id', 'patient_id')
                    ->withPivot('appointment_date')
                    ->withTimestamps();
    }

    // 🔹 العلاقة مع المستخدم (الطبيب لديه حساب مستخدم)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔹 العلاقة مع العيادة (كل طبيب ينتمي إلى عيادة واحدة)
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    // 🔹 العلاقة مع المراجعات (كل طبيب لديه مراجعات متعددة)
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // 🔹 العلاقة مع المواعيد (كل طبيب لديه مواعيد متعددة)
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}

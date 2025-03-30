<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';

    protected $fillable = [
        'user_id', 
        'date_of_birth', // تأكد من أنه يتطابق مع اسم الحقل في قاعدة البيانات
        'gender'
    ];

    // العلاقة مع الأطباء الذين حجز عندهم المريض
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'appointments', 'patient_id', 'doctor_id')
                    ->withPivot('appointment_date')
                    ->withTimestamps();
    }

    // العلاقة مع المستخدم (User)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $table = 'clinics';

    protected $fillable = [
        'name',
        'location',
    ];

    // العلاقة مع الطبيب (كل عيادة تحتوي على طبيب واحد فقط)
    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'clinic_id');
    }
}

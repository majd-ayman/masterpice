<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinic extends Model
{
    use HasFactory, SoftDeletes; 
    protected $table = 'clinics';

    protected $fillable = [
        'name',
        'location',
        'contact_number',
        'facilities',
        'description',
        
    ];

    protected $dates = ['deleted_at'];

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'clinic_id');
    }
}

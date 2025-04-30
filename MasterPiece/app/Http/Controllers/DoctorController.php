<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Review; 
use App\Models\Appointment; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function about() // aboutus page
    {
        $doctors = Doctor::take(4)->get(); 
        $reviews = Review::with('user') 
            ->orderBy('created_at', 'desc') 
            ->take(5) 
            ->get();

        $reviewsMessage = $reviews->isEmpty() ? 'لا توجد تعليقات حالياً' : null;

        return view('about', compact('doctors', 'reviews', 'reviewsMessage')); 
    }

    public function showDoctors()
    {
        $clinics = Clinic::all(); 
        $doctors = Doctor::with('clinic')->get(); 
        foreach ($doctors as $doctor) {
            if ($doctor->reviews->isNotEmpty()) {
                $doctor->average_rating = $doctor->reviews->avg('rating'); 
            } else {
                $doctor->average_rating = 'لا توجد تقييمات بعد'; // إذا لم يكن هناك تقييمات
            }
        }

        return view('doctor', compact('clinics', 'doctors')); // تمرير الأطباء والعيادات للـ view
    }
    
    public function shows($id)
    {
        $doctor = Doctor::findOrFail($id); // جلب بيانات الطبيب بناءً على الـ ID

        // جلب التعليقات المرتبطة بالطبيب
        $reviews = Review::where('doctor_id', $doctor->id)
                         ->with('user', 'appointment')
                         ->latest()
                         ->get();

        // إضافة فحص في حالة عدم وجود مراجعات
        $reviewsMessage = $reviews->isEmpty() ? 'لا توجد تعليقات لهذا الطبيب بعد' : null;
    
        
        return view('doctor-single', compact('doctor', 'reviews', 'reviewsMessage')); 
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id); 

        $reviews = Review::where('doctor_id', $doctor->id)
                         ->with('user', 'appointment')
                         ->latest()
                         ->get();
                         $appointment = null;
                         if (Auth::check()) {
                             $appointment = Appointment::where('doctor_id', $doctor->id)
                                 ->where('user_id', Auth::id())
                                 ->where('status', 'completed')
                                 ->first();
                         }
        $reviewsMessage = $reviews->isEmpty() ? 'لا توجد تعليقات لهذا الطبيب بعد' : null;

        return view('doctor-single', compact('appointment','doctor', 'reviews', 'reviewsMessage'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;


use App\Http\Requests\StoreReviewRequest; // إذا كنت تستخدم Validation Request
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // public function store(StoreReviewRequest $request)
    // {
    //     $validated = $request->validated();

    //     // حفظ التقييم في قاعدة البيانات
    //     $review = new Review();
    //     $review->patient_id = $request->patient_id;
    //     $review->doctor_id = $request->doctor_id;
    //     $review->rating = $validated['rating'];
    //     $review->comment = $validated['comment'] ?? null;
    //     $review->save();

    //     return response()->json(['message' => 'The rating was added successfully'], 201);    }

    // public function showReviewsByDoctor($doctorId)
    // {
    //     $doctor = Doctor::findOrFail($doctorId);
    //     $reviews = $doctor->reviews; 

    //     return response()->json($reviews);
    // }

    public function index()
{
    $reviews = Review::with('user') 
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

    return view('about', compact('reviews'));
}




public function comment()
{
    // جلب الكومنتات وترتيبها من الأحدث
    $reviews = Review::with('user')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

    // عرض الكومنتات في صفحة index
    return view('index', compact('reviews'));
}



public function store(Request $request)
    {
        // التأكد من تسجيل الدخول
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'يجب تسجيل الدخول أولاً لتقييم الموعد.');
        }

        // التحقق من وجود الموعد
        $appointment = Appointment::find($request->appointment_id);

        if (!$appointment) {
            return redirect()->back()->with('error', 'الموعد غير موجود.');
        }

        // التأكد من أن المستخدم هو الذي حجز الموعد
        if ($appointment->user_id != auth()->id()) {
            return redirect()->back()->with('error', 'لا يمكنك تقييم هذا الموعد، لأنه ليس من حجزه.');
        }

        // التأكد من أن الموعد تم الانتهاء منه
        if ($appointment->status !== 'completed') {  // أو الحالة التي تدل على أنه تم الانتهاء من الموعد
            return redirect()->back()->with('error', 'لا يمكنك إضافة التقييم إلا بعد حضور الموعد.');
        }

        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_id' => 'required|exists:appointments,id',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // إضافة التقييم في قاعدة البيانات
        Review::create([
            'user_id' => auth()->id(),
            'doctor_id' => $request->doctor_id,
            'appointment_id' => $request->appointment_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        // إرجاع رسالة نجاح
        return redirect()->back()->with('success', 'تم إرسال التقييم بنجاح!');
    }
}

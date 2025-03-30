<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Patient;
use App\Models\Doctor;
use App\Http\Requests\StoreReviewRequest; // إذا كنت تستخدم Validation Request
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // دالة لحفظ التقييم
    public function store(StoreReviewRequest $request)
    {
        // تحقق من البيانات المرسلة باستخدام Form Request Validation
        $validated = $request->validated();

        // حفظ التقييم في قاعدة البيانات
        $review = new Review();
        $review->patient_id = $request->patient_id;
        $review->doctor_id = $request->doctor_id;
        $review->rating = $validated['rating'];
        $review->comment = $validated['comment'] ?? null;
        $review->save();

        return response()->json(['message' => 'التقييم تم إضافته بنجاح'], 201);
    }

    // دالة لعرض التقييمات الخاصة بطبيب معين
    public function showReviewsByDoctor($doctorId)
    {
        $doctor = Doctor::findOrFail($doctorId);
        $reviews = $doctor->reviews; // باستخدام العلاقة في موديل Doctor

        return response()->json($reviews);
    }
}

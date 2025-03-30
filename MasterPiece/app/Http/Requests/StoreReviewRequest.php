<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    /**
     * تحديد ما إذا كان المستخدم مخولاً بإجراء هذا الطلب.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // تأكد من السماح للمستخدم بإجراء الطلب
    }

    /**
     * الحصول على قواعد التحقق من الصحة (Validation).
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rating' => 'required|integer|between:1,5', // التحقق من أن التقييم بين 1 و 5
            'comment' => 'nullable|string|max:1000', // التحقق من أن التعليق نصي ويحتوي على 1000 حرف كحد أقصى
            'doctor_id' => 'required|exists:doctors,id', // التحقق من وجود الطبيب في قاعدة البيانات
            'patient_id' => 'required|exists:users,id', // التحقق من وجود المريض في قاعدة البيانات
        ];
    }
}

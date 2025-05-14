<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;


use App\Http\Requests\StoreReviewRequest; 
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
    $reviews = Review::with('user')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

    return view('index', compact('reviews'));
}



public function store(Request $request)
    {
        if (!auth()->check()) {
return redirect()->back()->with('error', 'You must log in first to evaluate the appointment.');        }

        $appointment = Appointment::find($request->appointment_id);

        if (!$appointment) {
return redirect()->back()->with('error', 'The appointment does not exist.');        }

        if ($appointment->user_id != auth()->id()) {
return redirect()->back()->with('error', 'You cannot evaluate this appointment, because it is not booked.');        }

        if ($appointment->status !== 'completed') {  
return redirect()->back()->with('error', 'You can only add the evaluation after attending the appointment.');        }

        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_id' => 'required|exists:appointments,id',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'doctor_id' => $request->doctor_id,
            'appointment_id' => $request->appointment_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

return redirect()->back()->with('success', 'Evaluation submitted successfully!');    }
}

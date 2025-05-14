<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function showForm() {
        return view('contact');
    }



    public function store(Request $request)
    {
        Validator::extend('words_between', function ($attribute, $value, $parameters, $validator) {
            $min = $parameters[0];
            $max = $parameters[1];

            $wordCount = str_word_count($value);

            return $wordCount >= $min && $wordCount <= $max;
        });

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|words_between:1,50',  
        ], [
            'message.words_between' => 'Your message must be between 1 and 50 words.', 
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Your message has been sent successfully.');
    }
}

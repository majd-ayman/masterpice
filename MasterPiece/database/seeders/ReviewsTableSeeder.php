<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // مسح البيانات الحالية من جدول المراجعات
        DB::table('reviews')->truncate();

        $reviews = [
            [
                'user_id' => 7,
                'doctor_id' => 1,
                'appointment_id' => 1,
                'rating' => 5,
                'comment' => 'Excellent doctor! Very professional and kind.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 8,
                'doctor_id' => 3,
                'appointment_id' => 3,
                'rating' => 4,
                'comment' => 'Good experience, doctor was helpful.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 9,
                'doctor_id' => 1,
                'appointment_id' => 4,
                'rating' => 5,
                'comment' => 'Very friendly and knowledgeable!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // 10 تعليقات إضافية
            [
                'user_id' => 10,
                'doctor_id' => 2,
                'appointment_id' => 2,
                'rating' => 4,
                'comment' => 'Great doctor, but the wait time was a bit long.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 11,
                'doctor_id' => 4,
                'appointment_id' => 5,
                'rating' => 5,
                'comment' => 'Amazing experience, very thorough examination.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 12,
                'doctor_id' => 5,
                'appointment_id' => 6,
                'rating' => 3,
                'comment' => 'The doctor was good, but the clinic was a bit crowded.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 13,
                'doctor_id' => 6,
                'appointment_id' => 7,
                'rating' => 5,
                'comment' => 'Very professional and caring. Would recommend.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 14,
                'doctor_id' => 1,
                'appointment_id' => 8,
                'rating' => 4,
                'comment' => 'Good doctor, but I had to wait a while.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 15,
                'doctor_id' => 2,
                'appointment_id' => 9,
                'rating' => 4,
                'comment' => 'Very kind and professional, but expensive.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 16,
                'doctor_id' => 3,
                'appointment_id' => 10,
                'rating' => 5,
                'comment' => 'Great consultation and friendly atmosphere.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 17,
                'doctor_id' => 4,
                'appointment_id' => 11,
                'rating' => 3,
                'comment' => 'The doctor was fine, but the appointment took too long.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 18,
                'doctor_id' => 5,
                'appointment_id' => 12,
                'rating' => 5,
                'comment' => 'Highly skilled doctor, very happy with the treatment.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 19,
                'doctor_id' => 6,
                'appointment_id' => 13,
                'rating' => 4,
                'comment' => 'Good consultation, would visit again.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('reviews')->insert($reviews);

        // إعادة تمكين التحقق من القيود
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

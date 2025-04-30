<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // تعطيل التحقق من المفاتيح الأجنبية (Foreign Key Checks)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // حذف البيانات الحالية من جدول المواعيد
        DB::table('appointments')->truncate();  // حذف جميع المواعيد

        // إعادة تمكين التحقق من المفاتيح الأجنبية
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // الحصول على جميع الأطباء من قاعدة البيانات (من المفترض أن الأطباء موجودين مسبقًا في جدول doctors)
        $doctors = DB::table('doctors')->get();

        // مصفوفة لإضافة المواعيد
        $appointments = [];

        // لكل طبيب إضافة 10 مواعيد
        foreach ($doctors as $doctor) {
            for ($i = 1; $i <= 10; $i++) {
                $appointments[] = [
                    'user_id' => rand(1, 10),  // اختيار معرف عشوائي للمستخدم
                    'doctor_id' => $doctor->id, // استخدام معرف الطبيب
                    'clinic_id' => rand(1, 6),  // اختيار عشوائي للعيادة (نفترض أن هناك 6 عيادات)
                    'appointment_date' => Carbon::now()->addDays(rand(1, 30))->toDateString(),  // إضافة تاريخ عشوائي للموعد
                    'appointment_time' => Carbon::now()->addMinutes(rand(30, 300))->toTimeString(),  // إضافة وقت عشوائي للموعد
                    'status' => 'confirmed',  // تعيين الحالة كـ confirmed
                    'appointment_type' => 'checkup',  // تعيين نوع الموعد
                    'notes' => 'General checkup',  // ملاحظات
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'is_available' => 1  // تعيين الموعد كمتاح
                ];
            }
        }

        // إدخال المواعيد إلى الجدول
        DB::table('appointments')->insert($appointments);
    }
}

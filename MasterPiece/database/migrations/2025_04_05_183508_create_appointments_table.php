<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade'); // الطبيب
            $table->foreignId('clinic_id')->constrained('clinics')->onDelete('cascade'); // العيادة
            $table->date('appointment_date'); // تاريخ الموعد
            $table->time('appointment_time'); // وقت الموعد
            $table->enum('status', ['scheduled', 'confirmed', 'pending', 'completed', 'canceled'])->default('scheduled'); // حالة الموعد
            $table->enum('appointment_type', ['consultation', 'routine_checkup', 'treatment'])->default('consultation'); // نوع الموعد
            $table->text('notes')->nullable(); // ملاحظات إضافية
            $table->timestamps();

            // منع تكرار حجز نفس المريض لنفس الطبيب في نفس العيادة بنفس اليوم وفي نفس الوقت
            $table->unique(['doctor_id', 'appointment_date', 'appointment_time'], 'unique_doctor_time');
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}

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
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade'); 
            $table->foreignId('clinic_id')->constrained('clinics')->onDelete('cascade'); 
            $table->date('appointment_date'); 
            $table->time('appointment_time'); 
            $table->enum('status', ['scheduled', 'confirmed', 'pending', 'completed', 'canceled'])->default('scheduled');
            $table->enum('appointment_type', ['consultation', 'routine_checkup', 'treatment'])->default('consultation'); 
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->unique(['doctor_id', 'appointment_date', 'appointment_time'], 'unique_doctor_time');
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}

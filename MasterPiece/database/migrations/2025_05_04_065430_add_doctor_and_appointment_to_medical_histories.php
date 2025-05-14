<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDoctorAndAppointmentToMedicalHistories extends Migration
{
    public function up()
    {
        Schema::table('medical_histories', function (Blueprint $table) {
            if (!Schema::hasColumn('medical_histories', 'doctor_id')) {
                $table->foreignId('doctor_id')
                      ->nullable()
                      ->constrained()
                      ->onDelete('cascade');
            }

            if (!Schema::hasColumn('medical_histories', 'appointment_id')) {
                $table->foreignId('appointment_id')
                      ->nullable()
                      ->constrained()
                      ->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('medical_histories', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropColumn('doctor_id');

            $table->dropForeign(['appointment_id']);
            $table->dropColumn('appointment_id');
        });
    }
}


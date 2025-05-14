<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDoctorAndAppointmentFromMedicalHistoriesTable extends Migration
{
    public function up()
    {
        Schema::table('medical_histories', function (Blueprint $table) {
            if (Schema::hasColumn('medical_histories', 'doctor_id')) {
                try {
                    $table->dropForeign('medical_histories_doctor_id_foreign');
                } catch (\Exception $e) {
                }
                $table->dropColumn('doctor_id');
            }
    
            if (Schema::hasColumn('medical_histories', 'appointment_id')) {
                try {
                    $table->dropForeign('medical_histories_appointment_id_foreign');
                } catch (\Exception $e) {
                    //
                }
                $table->dropColumn('appointment_id');
            }
        });
    }
    

    public function down()
    {
        Schema::table('medical_histories', function (Blueprint $table) {
            $table->foreignId('doctor_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('appointment_id')->nullable()->constrained()->onDelete('cascade');
        });
    }
}

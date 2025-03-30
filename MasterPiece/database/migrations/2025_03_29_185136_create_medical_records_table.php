<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMedicalRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade'); // ✅ تصحيح العلاقة
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            $table->text('diagnosis');
            $table->text('prescription')->nullable();
            $table->text('treatment')->nullable();
            $table->timestamp('record_date')->default(DB::raw('CURRENT_TIMESTAMP')); // تاريخ السجل الطبي
            $table->timestamp('diagnosis_date')->nullable(); // تاريخ التشخيص
            $table->timestamp('follow_up')->nullable(); // مواعيد متابعة الحالة
            $table->timestamps();
            $table->string('image')->nullable(); // لحفظ صور الفحص

        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
}
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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            $table->text('diagnosis');
            $table->text('prescription')->nullable();
            $table->text('treatment')->nullable();
            $table->timestamp('record_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('diagnosis_date')->nullable(); 
            $table->timestamp('follow_up')->nullable(); 
            $table->timestamps();
            $table->string('image')->nullable(); 

        });
    }

    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
}
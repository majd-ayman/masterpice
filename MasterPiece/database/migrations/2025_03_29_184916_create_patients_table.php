<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->unique(); 
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade'); 
            $table->date('date_of_birth')->nullable(); 
            $table->enum('gender', ['male', 'female']); 
            $table->string('phone')->nullable(); 
            $table->text('address')->nullable(); 
            $table->text('medical_notes')->nullable(); 
            $table->timestamps();
            $table->string('emergency_contact')->nullable();
            $table->text('insurance_details')->nullable(); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};


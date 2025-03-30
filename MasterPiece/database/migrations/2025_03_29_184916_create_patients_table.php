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
            $table->string('name'); // اسم المريض
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->unique(); // المريض مرتبط بمستخدم
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade'); // الطبيب المعالج
            $table->date('date_of_birth')->nullable(); // تاريخ الميلاد
            $table->enum('gender', ['male', 'female']); // الجنس
            $table->string('phone')->nullable(); // رقم الهاتف
            $table->text('address')->nullable(); // عنوان المريض
            $table->text('medical_notes')->nullable(); // ملاحظات طبية
            $table->timestamps();
            $table->string('emergency_contact')->nullable();
            $table->text('insurance_details')->nullable(); // تفاصيل التأمين

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


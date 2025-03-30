<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم العيادة
            $table->text('location'); // موقع العيادة
            $table->string('contact_number', 20)->nullable(); // رقم الهاتف الخاص بالعيادة
            $table->text('facilities')->nullable(); // أنواع الخدمات المتاحة في العيادة
            $table->timestamps(0); // إنشاء timestamps مع precision 0 (لا يوجد جزء عشري)
        });
    }

    public function down()
    {
        Schema::dropIfExists('clinics');
    }
}

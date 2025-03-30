<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id(); // معرف فريد للقسم
            $table->string('name'); // اسم القسم
            $table->text('description')->nullable(); // وصف القسم
            $table->timestamps(); // التواريخ الخاصة بالإنشاء والتحديث
            $table->string('image')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departments');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDoctorsTableNullable extends Migration
{
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            // جعل الحقول المطلوبة nullable
            $table->string('specialty', 100)->nullable()->change();
            $table->time('available_from')->nullable()->change();
            $table->time('available_to')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->text('skills')->nullable()->change();
            $table->text('educational_qualifications')->nullable()->change();
            $table->string('image')->nullable()->change();
            $table->integer('experience')->nullable()->change();
            $table->json('working_days')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            // في حالة الرجوع للتعديل السابق، يمكن جعل الحقول غير nullable
            $table->string('specialty', 100)->nullable(false)->change();
            $table->time('available_from')->nullable(false)->change();
            $table->time('available_to')->nullable(false)->change();
            $table->text('description')->nullable(false)->change();
            $table->text('skills')->nullable(false)->change();
            $table->text('educational_qualifications')->nullable(false)->change();
            $table->string('image')->nullable(false)->change();
            $table->integer('experience')->nullable(false)->change();
            $table->json('working_days')->nullable(false)->change();
        });
    }
}

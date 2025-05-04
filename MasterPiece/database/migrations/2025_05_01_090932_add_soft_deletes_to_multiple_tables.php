<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->softDeletes();
        });
    
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
    
        Schema::table('departments', function (Blueprint $table) {
            $table->softDeletes();
        });
    
        Schema::table('contacts', function (Blueprint $table) {
            $table->softDeletes();
        });
    
        Schema::table('medical_records', function (Blueprint $table) {
            $table->softDeletes();
        });
    }
    
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    
        Schema::table('departments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    
        Schema::table('medical_records', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
    
};

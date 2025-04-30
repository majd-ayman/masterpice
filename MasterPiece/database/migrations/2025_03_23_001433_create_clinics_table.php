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
            $table->string('name'); 
            $table->text('location'); 
            $table->string('contact_number', 20)->nullable();
            $table->text('facilities')->nullable();
            $table->timestamps(0); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('clinics');
    }
}

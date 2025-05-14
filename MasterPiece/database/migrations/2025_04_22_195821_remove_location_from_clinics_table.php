<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveLocationFromClinicsTable extends Migration
{
    public function up()
    {
        Schema::table('clinics', function (Blueprint $table) {
            $table->dropColumn('location');
        });
    }

    public function down()
    {
        Schema::table('clinics', function (Blueprint $table) {
            $table->text('location')->nullable(); 
        });
    }
}

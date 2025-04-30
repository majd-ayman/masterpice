<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveServicesFeaturesFromClinicsTable extends Migration
{
    public function up()
    {
        Schema::table('clinics', function (Blueprint $table) {
            $table->dropColumn('services_features'); 
        });
    }

    public function down()
    {
        Schema::table('clinics', function (Blueprint $table) {
            $table->text('services_features')->nullable(); 
        });
    }
}

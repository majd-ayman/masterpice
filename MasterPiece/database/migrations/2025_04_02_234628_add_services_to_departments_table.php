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
        Schema::table('departments', function (Blueprint $table) {
            $table->text('services')->nullable()->after('image'); 
        });
    }
    
    public function down()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn('services'); 
        });
    }
    
};

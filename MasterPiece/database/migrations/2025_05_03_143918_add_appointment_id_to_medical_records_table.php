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
        Schema::table('medical_records', function (Blueprint $table) {
            $table->unsignedBigInteger('appointment_id')->nullable()->after('doctor_id');
    
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('medical_records', function (Blueprint $table) {
        $table->dropForeign(['appointment_id']);
        $table->dropColumn('appointment_id');
    });
}

};

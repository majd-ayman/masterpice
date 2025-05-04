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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
    
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
    
            $table->text('chronic_diseases')->nullable();       
            $table->text('current_medications')->nullable();    
            $table->text('allergies')->nullable();              
            $table->text('past_surgeries')->nullable();         
            $table->boolean('is_pregnant')->nullable();         
            $table->text('family_history')->nullable();        
            $table->text('lifestyle')->nullable();              
            $table->text('mental_health_notes')->nullable();    
            $table->text('additional_notes')->nullable();       
    
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('medical_histories');
    }
    
};

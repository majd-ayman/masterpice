<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('clinics', function (Blueprint $table) {
            $table->text('location')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('clinics', function (Blueprint $table) {
            $table->text('location')->nullable(false)->change();
        });
    }
};

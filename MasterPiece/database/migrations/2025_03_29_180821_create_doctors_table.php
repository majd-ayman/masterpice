
<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('phone')->nullable(); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->unique(); 
            $table->foreignId('clinic_id')->constrained('clinics')->onDelete('cascade')->unique(); 
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');

            $table->string('specialty', 100);
            $table->time('available_from');
            $table->time('available_to');
            $table->timestamps();
            $table->text('description')->nullable();
            $table->text('skills')->nullable();
            $table->text('educational_qualifications')->nullable();
            $table->string('image')->nullable();
            $table->integer('experience')->nullable(); // عدد سنوات الخبرة
            $table->json('working_days')->nullable(); // الأيام التي يعمل فيها الطبيب
            $table->string('profile_picture')->nullable(); // صورة ملف الطبيب الشخصي
        });
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}

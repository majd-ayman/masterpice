<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('appointments')->truncate();  

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $doctors = DB::table('doctors')->get();

        $appointments = [];

        foreach ($doctors as $doctor) {
            for ($i = 1; $i <= 10; $i++) {
                $appointments[] = [
                    'user_id' => rand(1, 10),  
                    'doctor_id' => $doctor->id, 
                    'clinic_id' => rand(1, 6),  
                    'appointment_date' => Carbon::now()->addDays(rand(1, 30))->toDateString(),
                    'appointment_time' => Carbon::now()->addMinutes(rand(30, 300))->toTimeString(),  
                    'status' => 'confirmed',  
                    'appointment_type' => 'checkup',
                    'notes' => 'General checkup',  
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'is_available' => 1 
                ];
            }
        }

        DB::table('appointments')->insert($appointments);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('doctors')->truncate();

        DB::table('doctors')->insert([
            [
                'name' => 'Dr. Ahmad Al Issa',
                'phone' => '0791234567',
                'user_id' => 1,
                'clinic_id' => 1,
                'department_id' => 1,
                'specialty' => 'Laboratory Specialist',
                'available_from' => '08:00:00',
                'available_to' => '13:00:00',
                'description' => 'I have been a laboratory specialist for over 5 years, dedicated to providing accurate and reliable medical testing for my patients. I use the latest technology to ensure precise results.',
                'educational_qualifications' => 'Master’s in Medical Laboratory Sciences, University of Jordan',
                'skills' => 'Medical testing, blood tests, lab management',
                'expertise_area' => 'Specialized in hematology and clinical chemistry, focusing on disease diagnosis through lab tests.',
                'experience' => 5,
                'image' => '1.jpg',
                'working_days' => json_encode(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday']),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dr. Mohammad Al Shami',
                'phone' => '0792345678',
                'user_id' => 2,
                'clinic_id' => 2,
                'department_id' => 2,
                'specialty' => 'Cardiologist',
                'available_from' => '08:00:00',
                'available_to' => '13:00:00',
                'description' => 'I am a cardiologist specializing in the prevention and treatment of heart disease. With over 6 years of experience, I focus on providing personalized care and developing treatment plans that improve my patients\' quality of life.',
                'educational_qualifications' => 'MD in Cardiology, Cairo University',
                'skills' => 'Cardiac care, heart disease management, electrocardiogram (ECG), echocardiography',
                'expertise_area' => 'Specialized in heart disease diagnosis, preventive cardiology, and managing complex cardiac conditions.',
                'experience' => 6,
                'image' => '2.jpg',
                'working_days' => json_encode(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday']),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dr. Sara Al Masri',
                'phone' => '0793456789',
                'user_id' => 3,
                'clinic_id' => 3,
                'department_id' => 3,
                'specialty' => 'Dentist',
                'available_from' => '08:00:00',
                'available_to' => '13:00:00',
                'description' => 'As a general dentist with a passion for cosmetic dentistry, I provide comprehensive dental care and specialize in creating beautiful, natural smiles.',
                'educational_qualifications' => 'Bachelor in Dentistry, University of Jordan',
                'skills' => 'Cosmetic dentistry, dental procedures, oral health education',
                'expertise_area' => 'Expert in smile design, teeth whitening, crowns, and bridges.',
                'experience' => 4,
                'image' => '3.jpg',
                'working_days' => json_encode(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday']),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dr. Khaled Al Hajj',
                'phone' => '0794567890',
                'user_id' => 4,
                'clinic_id' => 4,
                'department_id' => 4,
                'specialty' => 'Body Surgery Specialist',
                'available_from' => '08:00:00',
                'available_to' => '13:00:00',
                'description' => 'Specialist in body surgeries, particularly reconstructive and aesthetic procedures. I am committed to enhancing my patients’ physical appearance and restoring function through innovative surgical techniques.',
                'educational_qualifications' => 'MD in Body Surgery, University of Damascus',
                'skills' => 'Body enhancement, reconstruction surgery, post-operative care',
                'expertise_area' => 'Expert in reconstructive surgery, body contouring, and aesthetic enhancements.',
                'experience' => 7,
                'image' => '4.jpg',
                'working_days' => json_encode(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday']),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dr. Yara Al Khatib',
                'phone' => '0795678901',
                'user_id' => 5,
                'clinic_id' => 5,
                'department_id' => 5,
                'specialty' => 'Neurological Surgery Specialist',
                'available_from' => '08:00:00',
                'available_to' => '13:00:00',
                'description' => 'As a neurological surgery expert, I perform surgeries to treat conditions affecting the brain, spine, and nervous system. I prioritize patient recovery and strive to provide the best possible surgical outcomes.',
                'educational_qualifications' => 'MD in Neurosurgery, University of Alexandria',
                'skills' => 'Neurological surgeries, brain surgery, spinal procedures',
                'expertise_area' => 'Specialized in brain tumor surgeries, spine surgery, and the treatment of neurological disorders.',
                'experience' => 8,
                'image' => '5.jpg',
                'working_days' => json_encode(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday']),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dr. Laila Al Junaidi',
                'phone' => '0796789012',
                'user_id' => 6,
                'clinic_id' => 6,
                'department_id' => 6,
                'specialty' => 'Gynecology Specialist',
                'available_from' => '08:00:00',
                'available_to' => '13:00:00',
                'description' => 'I am a gynecologist with a focus on women’s health, including reproductive health, family planning, and prenatal care. I am dedicated to providing compassionate care and ensuring my patients\' well-being.',
                'educational_qualifications' => 'MD in Gynecology, University of Cairo',
                'skills' => 'Women’s health, reproductive health, prenatal care',
                'expertise_area' => 'Specialized in managing high-risk pregnancies, performing laparoscopic surgeries, and providing routine gynecological care.',
                'experience' => 5,
                'image' => '6.jpg',
                'working_days' => json_encode(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday']),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
    
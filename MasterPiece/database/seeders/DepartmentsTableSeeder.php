<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('departments')->truncate();
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        DB::table('departments')->insert([
            [
                'name' => 'Ophtomology',
                'description' => 'Eye care, surgery services, vision tests.',
                'image' => 'service-1.jpg',
                'services' => 'Eye exams, surgery, laser treatment.',
                'services_features' => '1. LASIK Surgery, 2. Cataract Surgery, 3. Retina Care, 4. Vision Correction, 5. Eye Exams, 6. Advanced Diagnostics',
                'long_description' => 'Eye care services provided with the utmost precision, offering advanced treatments for vision problems. Our specialists use state-of-the-art technology to diagnose and treat various eye conditions. Whether for routine check-ups or complex surgeries, we ensure personalized care for every patient. From preventive care to specialized surgeries, our goal is to restore and improve your vision. Trust us for reliable and effective eye care solutions. Our clinic offers a wide range of services, including LASIK, cataract surgery, and retina care. We prioritize comfort and safety in every procedure, ensuring optimal results for our patients.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cardiology',
                'description' => 'Heart care, diagnostic and treatments.',
                'image' => 'service-2.jpg',
                'services' => 'Heart monitoring, treatment options.',
                'services_features' => '1. EKG Services, 2. Heart Disease Diagnosis, 3. Pacemaker Implantation, 4. Cardiovascular Surgery, 5. Stress Tests, 6. Cholesterol Management',
                'long_description' => 'Our cardiology department offers comprehensive care for heart conditions. We specialize in diagnosing and treating heart diseases, including hypertension, arrhythmias, and coronary artery disease. Our state-of-the-art facilities allow us to perform advanced diagnostics like EKG, stress tests, and echocardiograms. With a focus on both prevention and intervention, we provide personalized treatment plans to improve heart health. Our experienced cardiologists ensure that each patient receives the highest level of care, from heart monitoring to surgical procedures.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dental Care',
                'description' => 'Routine exams, cosmetic dental services.',
                'image' => 'service-3.jpg',
                'services' => 'Teeth cleaning, fillings, aesthetic care.',
                'services_features' => '1. Teeth Cleaning, 2. Fillings, 3. Cosmetic Dentistry, 4. Root Canal Treatments, 5. Teeth Whitening, 6. Smile Makeovers',
                'long_description' => 'We offer a full range of dental services to ensure the health and beauty of your smile. From routine check-ups to cosmetic procedures, we provide personalized care tailored to each patient’s needs. Our services include teeth cleaning, fillings, whitening, and smile makeovers. We also specialize in restorative dentistry, such as root canal treatments and crowns. Our skilled team uses the latest dental technology to provide pain-free and efficient treatments, ensuring long-term oral health.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Child Care',
                'description' => 'Pediatric care, regular health checkups.',
                'image' => 'service-4.jpg',
                'services' => 'Vaccinations, children’s health services.',
                'services_features' => '1. Immunization, 2. Pediatric Checkups, 3. Child Nutrition Advice, 4. Behavioral Health Services, 5. Pediatric Surgery, 6. Developmental Monitoring',
                'long_description' => 'Our pediatric department offers comprehensive healthcare for children, from newborns to adolescents. We provide regular checkups to monitor growth and development, as well as vaccination services to ensure your child stays protected. Our pediatricians specialize in both physical and behavioral health, addressing a wide range of health concerns. We also offer developmental monitoring and provide guidance on child nutrition and parenting. Our goal is to ensure that every child has access to the best care, right from the start.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pulmology',
                'description' => 'Lung care, respiratory treatments and tests.',
                'image' => 'service-6.jpg',
                'services' => 'Lung diagnosis, chronic disease care.',
                'services_features' => '1. Asthma Management, 2. Chronic Obstructive Pulmonary Disease (COPD) Care, 3. Pulmonary Rehabilitation, 4. Sleep Apnea Testing, 5. Oxygen Therapy, 6. Lung Cancer Screening',
                'long_description' => 'Our pulmology department provides comprehensive care for respiratory conditions, including asthma, COPD, and sleep apnea. We offer advanced diagnostic tests, such as spirometry and chest X-rays, to accurately diagnose lung diseases. Our specialists work closely with patients to develop personalized treatment plans, which may include pulmonary rehabilitation, oxygen therapy, and lifestyle adjustments. We also provide lung cancer screenings and offer ongoing management for chronic lung conditions. Your respiratory health is our priority, and we ensure that every patient receives the best care.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gynecology',
                'description' => 'Women’s health, gynecological services.',
                'image' => 'service-8.jpg',
                'services' => 'Maternity care, exams, women’s health.',
                'services_features' => '1. Prenatal Care, 2. Menopause Management, 3. Pap Smears, 4. Birth Control Advice, 5. Gynecological Surgery, 6. Hormonal Therapy',
                'long_description' => 'Our gynecology department specializes in women’s health services, offering everything from routine check-ups to advanced gynecological treatments. We provide comprehensive maternity care, prenatal visits, and childbirth support. Additionally, we offer menopause management, hormone therapy, and family planning services, including birth control consultations. Our experienced gynecologists are dedicated to ensuring women’s health at every stage of life, with a focus on preventive care, education, and compassionate treatment.',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}

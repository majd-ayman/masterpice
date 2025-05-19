<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContactsTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('contacts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $now = Carbon::now();

        $contacts = [
            [
                'name' => 'Ahmad Al-Saleh',
                'email' => 'ahmad.saleh@example.com',
                'subject' => 'Inquiry about services',
                'phone' => '0791234567',
                'message' => 'I would like to know more about your clinic services.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Sara Khoury',
                'email' => 'sara.khoury@example.com',
                'subject' => 'Appointment scheduling',
                'phone' => '0789876543',
                'message' => 'How can I book an appointment with Dr. Ali?',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Mohammad Al-Masri',
                'email' => 'mohammad.masri@example.com',
                'subject' => 'Feedback',
                'phone' => '0777654321',
                'message' => 'Great experience at your clinic, thank you!',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Lina Abed',
                'email' => 'lina.abed@example.com',
                'subject' => 'Billing question',
                'phone' => '0799988776',
                'message' => 'I have a question regarding my recent bill.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Omar Al-Farouq',
                'email' => 'omar.farouq@example.com',
                'subject' => 'Clinic hours',
                'phone' => '0785544332',
                'message' => 'What are your clinic working hours during Ramadan?',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Dina Saad',
                'email' => 'dina.saad@example.com',
                'subject' => 'Prescription renewal',
                'phone' => '0771122334',
                'message' => 'Can I renew my prescription online?',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Yousef Nasser',
                'email' => 'yousef.nasser@example.com',
                'subject' => 'New patient registration',
                'phone' => '0793344556',
                'message' => 'How do I register as a new patient?',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Rania Haddad',
                'email' => 'rania.haddad@example.com',
                'subject' => 'Lab results',
                'phone' => '0782233445',
                'message' => 'When will my lab results be ready?',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Khaled Samir',
                'email' => 'khaled.samir@example.com',
                'subject' => 'Doctor availability',
                'phone' => '0775566778',
                'message' => 'Is Dr. Mahmoud available next week?',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Maha Zaid',
                'email' => 'maha.zaid@example.com',
                'subject' => 'General inquiry',
                'phone' => '0797766554',
                'message' => 'Do you accept health insurance?',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Fadi Al-Khatib',
                'email' => 'fadi.khatib@example.com',
                'subject' => 'Urgent appointment',
                'phone' => '0789988776',
                'message' => 'I need an urgent appointment, please advise.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('contacts')->insert($contacts);
    }
}

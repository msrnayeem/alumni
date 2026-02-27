<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'EZAZ@SOUTHASIAUNI.AC.BD'],
            [
                'name' => 'MD EZAZ AHMMED',
                'username' => '1814793124',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'role' => 'student',
                'student_id' => '1814793124',
                'registration_number' => '33745724',
                'program' => 'BACHELOR OF BUSINESS ADMINISTRATION (BBA)',
                'major_1' => 'ACCOUNTING INFORMATION SYSTEM',
                'enrolment_semester' => 'SPRING 2019',
                'graduation_year' => 'SPRING 2023',
                'credit_completed' => '126',
                'cgpa' => '3.50',
                'result_publication_date' => '2023-03-21',
                'current_status' => 'Graduated',
                'certificate_serial' => '04322',
                'date_of_birth' => '1998-06-22',
                'gender' => 'Male',
                'blood_group' => 'A+',
                'nationality' => 'Bangladeshi',
                'marital_status' => 'Single',
                'religion' => 'Islam',
                'nid_passport_no' => '6013435240',
                'mobile' => '+8801610820531',
                'present_address' => 'HOSENPUR, BHERAMARA, JOGOSHWAR-7040, KUSHTIA',
                'permanent_address' => 'HOSENPUR, BHERAMARA, JOGOSHWAR-7040, KUSHTIA',
                'father_name' => 'MD REZAUL HAQUE',
                'father_occupation' => 'FARMER',
                'mother_name' => 'MST ROMELA KHATUN',
                'mother_occupation' => 'HOUSE WIFE',
                'emergency_contact' => 'MD REZAUL HAQUE',
                'guardian_contact' => '+8801610820531',
                'profile_photo_path' => 'profile.jpeg',
                'signature_photo_path' => 'signature.jpeg',
            ]
        );
    }
}

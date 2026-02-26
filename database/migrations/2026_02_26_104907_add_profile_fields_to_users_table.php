<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('student');
            $table->string('username')->nullable()->unique();
            $table->string('registration_number')->nullable();
            $table->string('program')->nullable();
            $table->string('major_1')->nullable();
            $table->string('enrolment_semester')->nullable();
            $table->string('credit_completed')->nullable();
            $table->string('cgpa')->nullable();
            $table->string('result_publication_date')->nullable();
            $table->string('current_status')->nullable();
            $table->string('certificate_serial')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('nationality')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('religion')->nullable();
            $table->string('nid_passport_no')->nullable();
            $table->string('mobile')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('guardian_contact')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->string('signature_photo_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role',
                'username',
                'registration_number',
                'program',
                'major_1',
                'enrolment_semester',
                'credit_completed',
                'cgpa',
                'result_publication_date',
                'current_status',
                'certificate_serial',
                'date_of_birth',
                'gender',
                'blood_group',
                'nationality',
                'marital_status',
                'religion',
                'nid_passport_no',
                'mobile',
                'present_address',
                'permanent_address',
                'father_name',
                'father_occupation',
                'mother_name',
                'mother_occupation',
                'emergency_contact',
                'guardian_contact',
                'profile_photo_path',
                'signature_photo_path'
            ]);
        });
    }
};

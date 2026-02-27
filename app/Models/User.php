<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'student_id',
        'graduation_year',
        'degree',
        'major',
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
        'signature_photo_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at'       => 'datetime',
            'password'                => 'hashed',
            'date_of_birth'           => 'date',
            'result_publication_date' => 'date',
        ];
    }
}

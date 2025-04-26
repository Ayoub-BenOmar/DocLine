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

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', 'email', 'last_name', 'password', 'role', 'phone', 'profile_pic', 
        'medical_licence', 'medical_document', 'speciality_id',
        'city_id', 'office_address', 'education', 'fees', 'experience',
        'birthdate', 'gender', 'blood_type', 'past_illnesses',
        'surgeries', 'allergies', 'chronic', 'is_activated', 'is_approved'
    ];

    protected $casts = [
        'is_activated' => 'boolean'
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
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function appointmentsAsPatient(){
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function appointmentsAsDoctor(){
        return $this->hasMany(Appointment::class, 'doctor_id');
    }


    public function medicalCertificatesRequested()
    {
        return $this->hasMany(MedicalCertificate::class, 'patient_id');
    }

    public function medicalCertificatesReceived()
    {
        return $this->hasMany(MedicalCertificate::class, 'doctor_id');
    }
}

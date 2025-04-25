<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalConsultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'raison_consultation',
        'weight',
        'bpm',
        'blood_pressure',
        'blood_sugar',
        'current_diagnosis',
        'symptoms',
        'doctor_note',
        'date',
        'appointment_id'
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function doctor()
    {
        return $this->appointment->doctor();
    }

    public function patient()
    {
        return $this->appointment->patient();
    }
}

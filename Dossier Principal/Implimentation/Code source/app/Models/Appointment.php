<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'appointment_date',
        'appointment_time',
        'visit_type',
        'insurance_provider',
        'medical_documents',
        'status',
        'rescheduled_date',
        'rescheduled_time',
        'reschedule_reason',
        'notes'
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'rescheduled_date' => 'date',
        'medical_documents' => 'array'
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
} 
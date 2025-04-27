<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MedicalCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'from_date',
        'to_date',
        'status',
        'reason',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function patient(){
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor(){
        return $this->belongsTo(User::class, 'doctor_id');
    }
}

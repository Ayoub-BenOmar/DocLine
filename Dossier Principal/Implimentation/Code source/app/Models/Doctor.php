<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'city',
        'office_address',
        'education',
        'medical_licence',
        'medical_document',
        'fees',
        'experience',
        'speciality_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}

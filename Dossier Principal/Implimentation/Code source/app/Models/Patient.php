<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'birthdate',
        'gender',
        'blood_type',
        'past_illnesses',
        'surgeries',
        'allergies',
        'chronic'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

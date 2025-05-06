<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'speciality';

    protected $fillable = ['speciality_name'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function appointment(){
        return $this->hasMany(Appointment::class);
    }

    public function doctor()
    {
        return $this->hasMany(User::class)->where('role', 'doctor');
    }
}

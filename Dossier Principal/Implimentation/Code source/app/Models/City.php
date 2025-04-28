<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['city'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
}

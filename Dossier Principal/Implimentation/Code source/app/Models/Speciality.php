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
}

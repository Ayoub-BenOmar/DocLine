<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
}

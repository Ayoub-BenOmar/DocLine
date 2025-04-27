<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
        'title',
        'category',
        'author',
        'content',
        'image',
    ];
}

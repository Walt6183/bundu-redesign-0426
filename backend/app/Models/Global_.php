<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Global_ extends Model
{
    protected $table = 'globals';
    
    protected $fillable = [
        'key',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];
}

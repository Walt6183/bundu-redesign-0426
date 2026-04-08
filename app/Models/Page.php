<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'seo_title',
        'seo_description',
        'blocks',
        'is_published',
    ];

    protected $casts = [
        'blocks' => 'array',
        'is_published' => 'boolean',
    ];
}

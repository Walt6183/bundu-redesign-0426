<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Impuls extends Model
{
    protected $table = 'impulse';

    protected $fillable = [
        'titel',
        'slug',
        'kategorie',
        'autor',
        'datum',
        'intro',
        'inhalt',
        'key_takeaways',
        'lead_box_text',
        'lead_box_cta',
        'tags',
        'featured_image',
        'meta_titel',
        'meta_beschreibung',
        'aktiv',
        'featured',
    ];

    protected $casts = [
        'key_takeaways' => 'array',
        'tags' => 'array',
        'datum' => 'date',
        'aktiv' => 'boolean',
        'featured' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Impuls $impuls) {
            if (empty($impuls->slug)) {
                $impuls->slug = Str::slug($impuls->titel);
            }
        });
    }
}

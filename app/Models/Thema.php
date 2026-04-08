<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Thema extends Model
{
    protected $table = 'themen';

    protected $fillable = [
        'titel',
        'slug',
        'zielgruppen',
        'einleitung',
        'problem',
        'loesungsansatz',
        'meta_titel',
        'meta_beschreibung',
        'featured_image',
        'aktiv',
    ];

    protected $casts = [
        'zielgruppen' => 'array',
        'aktiv' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Thema $thema) {
            if (empty($thema->slug)) {
                $thema->slug = Str::slug($thema->titel);
            }
        });
    }

    public function angebote(): BelongsToMany
    {
        return $this->belongsToMany(Angebot::class, 'angebot_thema', 'thema_id', 'angebot_id');
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class, 'thema_id');
    }
}

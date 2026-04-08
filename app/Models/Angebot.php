<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Angebot extends Model
{
    protected $table = 'angebote';

    protected $fillable = [
        'titel',
        'slug',
        'zielgruppe',
        'kurzbeschreibung',
        'nutzen',
        'fuer_wen',
        'inhalte',
        'ablauf',
        'preis_info',
        'cta_text',
        'cta_url',
        'featured_image',
        'faqs',
        'meta_titel',
        'meta_beschreibung',
        'aktiv',
        'sortierung',
    ];

    protected $casts = [
        'zielgruppe' => 'array',
        'faqs' => 'array',
        'aktiv' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Angebot $angebot) {
            if (empty($angebot->slug)) {
                $angebot->slug = Str::slug($angebot->titel);
            }
        });
    }

    public function themen(): BelongsToMany
    {
        return $this->belongsToMany(Thema::class, 'angebot_thema', 'angebot_id', 'thema_id');
    }

    public function kursanmeldungen()
    {
        return $this->hasMany(Kursanmeldung::class, 'angebot_id');
    }
}

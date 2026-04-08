<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $table = 'downloads';

    protected $fillable = [
        'titel',
        'beschreibung',
        'datei',
        'zielgruppe',
        'kategorie',
        'aktiv',
    ];

    protected $casts = [
        'aktiv' => 'boolean',
    ];
}

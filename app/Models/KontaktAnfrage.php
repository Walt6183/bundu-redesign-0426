<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KontaktAnfrage extends Model
{
    protected $table = 'kontakt_anfragen';

    protected $fillable = [
        'name',
        'email',
        'ich_bin',
        'institution',
        'interesse',
        'betreff',
        'nachricht',
        'status',
        'datenschutz_akzeptiert',
    ];

    protected $casts = [
        'datenschutz_akzeptiert' => 'boolean',
    ];
}

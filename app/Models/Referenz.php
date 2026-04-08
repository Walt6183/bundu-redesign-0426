<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referenz extends Model
{
    protected $table = 'referenzen';

    protected $fillable = [
        'name',
        'organisation',
        'zitat',
        'zielgruppe',
        'bild',
        'aktiv',
        'sortierung',
    ];

    protected $casts = [
        'aktiv' => 'boolean',
    ];
}

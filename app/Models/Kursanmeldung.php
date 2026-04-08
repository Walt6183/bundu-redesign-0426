<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kursanmeldung extends Model
{
    protected $table = 'kursanmeldungen';

    protected $fillable = [
        'angebot_id',
        'kurstermin',
        'teilnehmer_anzahl',
        'institution',
        'kontaktperson',
        'kontakt_email',
        'bemerkungen',
        'status',
    ];

    public function angebot(): BelongsTo
    {
        return $this->belongsTo(Angebot::class, 'angebot_id');
    }
}

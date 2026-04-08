<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    protected $table = 'faqs';

    protected $fillable = [
        'frage',
        'antwort',
        'zielgruppe',
        'thema_id',
        'sortierung',
        'aktiv',
    ];

    protected $casts = [
        'aktiv' => 'boolean',
    ];

    public function thema(): BelongsTo
    {
        return $this->belongsTo(Thema::class, 'thema_id');
    }
}

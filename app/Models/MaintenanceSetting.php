<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceSetting extends Model
{
    protected $table = 'maintenance_settings';

    protected $fillable = [
        'enabled',
        'mode',
        'countdown_target',
        'headline',
        'message',
    ];

    protected $casts = [
        'enabled' => 'boolean',
        'countdown_target' => 'datetime',
    ];

    public static function current(): static
    {
        return static::firstOrCreate([], [
            'enabled' => false,
            'mode' => 'maintenance',
            'headline' => 'Wir sind bald zurück',
            'message' => 'Unsere Website wird gerade überarbeitet. Bitte schauen Sie später wieder vorbei.',
        ]);
    }

    public function isCountdown(): bool
    {
        return $this->mode === 'countdown' && $this->countdown_target !== null;
    }
}

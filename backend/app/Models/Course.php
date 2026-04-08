<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'description',
        'duration',
        'sessions',
        'max_participants',
        'price',
        'next_date',
        'highlights',
        'target_audience',
        'booking_url',
        'status',
        'cover_image',
        'sort_order',
        'seo_title',
        'seo_description',
    ];

    protected $casts = [
        'highlights' => 'array',
        'price' => 'decimal:2',
        'sort_order' => 'integer',
        'max_participants' => 'integer',
    ];

    /**
     * Scope: nur aktive/veröffentlichte Kurse
     */
    public function scopeActive($query)
    {
        return $query->whereIn('status', ['active', 'fully_booked']);
    }

    /**
     * Scope: nur veröffentlichte (nicht draft/archiv)
     */
    public function scopePublished($query)
    {
        return $query->whereNotIn('status', ['draft', 'archived']);
    }

    /**
     * Prüft ob der Kurs ausgebucht ist
     */
    public function getIsFullyBookedAttribute(): bool
    {
        return $this->status === 'fully_booked';
    }
}

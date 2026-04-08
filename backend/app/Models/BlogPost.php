<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'excerpt',
        'content',
        'category_id',
        'author',
        'cover_image',
        'seo_title',
        'seo_description',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function blogCategory(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    /**
     * Accessor for backward-compatible category name.
     */
    public function getCategoryNameAttribute(): ?string
    {
        return $this->blogCategory?->name;
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}

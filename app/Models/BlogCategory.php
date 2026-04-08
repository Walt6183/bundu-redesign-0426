<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    protected $fillable = [
        'name',
    ];

    public function blogPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class, 'category_id');
    }

    /**
     * Before deleting, reassign all related blog posts to the "Allgemein" category.
     */
    protected static function booted(): void
    {
        static::deleting(function (BlogCategory $category) {
            // Find or create the "Allgemein" fallback category
            $allgemein = BlogCategory::firstOrCreate(['name' => 'Allgemein']);

            // If we are deleting "Allgemein" itself, set posts to null instead
            if ($category->id === $allgemein->id) {
                $category->blogPosts()->update(['category_id' => null]);
            } else {
                $category->blogPosts()->update(['category_id' => $allgemein->id]);
            }
        });
    }
}

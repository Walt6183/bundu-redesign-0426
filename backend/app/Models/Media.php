<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'name',
        'file_path',
        'file_name',
        'file_type',
        'mime_type',
        'file_size',
        'alt_text',
        'description',
        'disk',
    ];

    protected $casts = [
        'file_size' => 'integer',
    ];

    /**
     * Get the full URL to the file
     */
    public function getUrlAttribute(): string
    {
        return \Illuminate\Support\Facades\Storage::disk($this->disk ?? 'public')->url($this->file_path);
    }

    /**
     * Scope: nur Bilder
     */
    public function scopeImages($query)
    {
        return $query->where('file_type', 'image');
    }

    /**
     * Scope: nur Dokumente
     */
    public function scopeDocuments($query)
    {
        return $query->where('file_type', 'document');
    }

    /**
     * Get human-readable file size
     */
    public function getReadableSizeAttribute(): string
    {
        $bytes = $this->file_size;
        if ($bytes >= 1048576) {
            return round($bytes / 1048576, 1) . ' MB';
        }
        if ($bytes >= 1024) {
            return round($bytes / 1024, 1) . ' KB';
        }
        return $bytes . ' B';
    }

    /**
     * Determine file type from MIME
     */
    public static function typeFromMime(string $mime): string
    {
        if (str_starts_with($mime, 'image/')) return 'image';
        if (str_starts_with($mime, 'video/')) return 'video';
        if (str_starts_with($mime, 'audio/')) return 'audio';
        return 'document';
    }
}

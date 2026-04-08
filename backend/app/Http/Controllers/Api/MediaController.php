<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Get all media, optionally filtered by type
     */
    public function index(Request $request)
    {
        $query = Media::orderBy('created_at', 'desc');

        if ($type = $request->get('type')) {
            $query->where('file_type', $type);
        }

        $limit = $request->get('limit', 50);
        if ($limit > 0) {
            $query->limit($limit);
        }

        $media = $query->get();

        return response()->json($media->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'file_url' => $this->resolveUrl($item->file_path, $item->disk),
                'file_name' => $item->file_name,
                'file_type' => $item->file_type,
                'mime_type' => $item->mime_type,
                'file_size' => $item->file_size,
                'readable_size' => $item->readable_size,
                'alt_text' => $item->alt_text,
                'description' => $item->description,
                'created_at' => $item->created_at?->toIso8601String(),
            ];
        }));
    }

    /**
     * Get a single media item by ID
     */
    public function show($id)
    {
        $item = Media::find($id);

        if (!$item) {
            return response()->json(['error' => 'Media not found'], 404);
        }

        return response()->json([
            'id' => $item->id,
            'name' => $item->name,
            'file_url' => $this->resolveUrl($item->file_path, $item->disk),
            'file_name' => $item->file_name,
            'file_type' => $item->file_type,
            'mime_type' => $item->mime_type,
            'file_size' => $item->file_size,
            'readable_size' => $item->readable_size,
            'alt_text' => $item->alt_text,
            'description' => $item->description,
            'created_at' => $item->created_at?->toIso8601String(),
        ]);
    }

    /**
     * Resolve file path to full URL
     */
    private function resolveUrl($path, $disk = 'public')
    {
        if (empty($path)) return null;
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }
        return Storage::disk($disk)->url($path);
    }
}

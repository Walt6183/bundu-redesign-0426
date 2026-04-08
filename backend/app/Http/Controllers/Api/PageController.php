<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Ping endpoint to check API status
     */
    public function ping()
    {
        return response()->json(['ok' => true]);
    }

    /**
     * Get a page by slug
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)
            ->where('is_published', true)
            ->first();

        if (!$page) {
            return response()->json([
                'error' => 'Page not found'
            ], 404);
        }

        // Convert Filament Builder format to flat format for frontend
        $blocks = $this->normalizeBlocks($page->blocks ?? []);

        // Resolve storage URLs for images
        $blocks = $this->resolveBlockAssetUrls($blocks);

        return response()->json([
            'slug' => $page->slug,
            'title' => $page->title,
            'seo_title' => $page->seo_title,
            'seo_description' => $page->seo_description,
            'blocks' => $blocks,
            'is_published' => $page->is_published,
        ]);
    }

    /**
     * Convert Filament Builder format [{type, data}] to flat {type: data} for frontend
     */
    private function normalizeBlocks($blocks)
    {
        if (!is_array($blocks)) return [];

        // Check if this is already flat format (legacy seeder data)
        $firstKey = array_key_first($blocks);
        if (is_string($firstKey) && !is_numeric($firstKey)) {
            return $blocks; // Already flat
        }

        // Convert Builder format to flat
        $flat = [];
        foreach ($blocks as $block) {
            if (isset($block['type'])) {
                $key = $block['type'];
                $data = $block['data'] ?? [];
                // For duplicate block types (e.g. multiple 'services'), use array
                if (isset($flat[$key])) {
                    if (!isset($flat[$key][0])) {
                        $flat[$key] = [$flat[$key]];
                    }
                    $flat[$key][] = $data;
                } else {
                    $flat[$key] = $data;
                }
            }
        }
        return $flat;
    }

    /**
     * Recursively resolve storage paths to full URLs in blocks
     */
    private function resolveBlockAssetUrls($blocks)
    {
        if (!is_array($blocks)) return $blocks;

        $imageKeys = ['backgroundImage', 'photo', 'cover', 'file', 'cover_image'];

        return array_map(function ($block) use ($imageKeys) {
            if (!is_array($block)) return $block;

            // Handle Builder block format: {type: '...', data: {...}}
            if (isset($block['data']) && is_array($block['data'])) {
                $block['data'] = $this->resolveDataAssetUrls($block['data'], $imageKeys);
            }

            // Handle flat format (legacy)
            return $this->resolveDataAssetUrls($block, $imageKeys);
        }, $blocks);
    }

    private function resolveDataAssetUrls($data, $imageKeys)
    {
        if (!is_array($data)) return $data;

        foreach ($data as $key => $value) {
            if (in_array($key, $imageKeys) && is_string($value) && !empty($value)) {
                // If it's a storage path (not already a URL), resolve it
                if (!str_starts_with($value, 'http://') && !str_starts_with($value, 'https://') && !str_starts_with($value, '/')) {
                    $data[$key] = Storage::disk('public')->url($value);
                }
            } elseif (is_array($value)) {
                $data[$key] = $this->resolveDataAssetUrls($value, $imageKeys);
            }
        }

        return $data;
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Global_;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GlobalController extends Controller
{
    /**
     * Get global settings by key
     */
    public function show($key = 'site')
    {
        $global = Global_::where('key', $key)->first();

        if (!$global) {
            return response()->json([
                'error' => 'Global not found'
            ], 404);
        }

        $content = $this->resolveAssetUrls($global->content ?? []);

        return response()->json([
            'key' => $global->key,
            'content' => $content,
        ]);
    }

    /**
     * Get all globals
     */
    public function index()
    {
        $globals = Global_::all();

        return response()->json($globals->map(function ($global) {
            return [
                'key' => $global->key,
                'content' => $this->resolveAssetUrls($global->content ?? []),
            ];
        }));
    }

    /**
     * Recursively resolve storage paths to full URLs
     */
    private function resolveAssetUrls($data)
    {
        if (!is_array($data)) return $data;

        $imageKeys = ['logo', 'portrait', 'favicon', 'ogImage'];

        foreach ($data as $key => $value) {
            if (in_array($key, $imageKeys) && is_string($value) && !empty($value)) {
                if (!str_starts_with($value, 'http://') && !str_starts_with($value, 'https://') && !str_starts_with($value, '/')) {
                    $data[$key] = Storage::disk('public_media')->url($value);
                }
            } elseif (is_array($value)) {
                $data[$key] = $this->resolveAssetUrls($value);
            }
        }

        return $data;
    }
}

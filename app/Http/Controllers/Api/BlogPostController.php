<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    /**
     * Get all published blog posts
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit', 10);
        $sort = $request->get('sort', 'desc');

        $query = BlogPost::with('blogCategory')
            ->published()
            ->orderBy('published_at', $sort);

        if ($limit > 0) {
            $query->limit($limit);
        }

        $posts = $query->get();

        return response()->json($posts->map(function ($post) {
            return [
                'id' => $post->id,
                'slug' => $post->slug,
                'title' => $post->title,
                'excerpt' => $post->excerpt,
                'category' => $post->blogCategory?->name,
                'author' => $post->author,
                'cover_image' => $this->resolveCoverImage($post->cover_image),
                'published_at' => $post->published_at?->toIso8601String(),
            ];
        }));
    }

    /**
     * Get a single blog post by slug
     */
    public function show($slug)
    {
        $post = BlogPost::with('blogCategory')
            ->where('slug', $slug)
            ->published()
            ->first();

        if (!$post) {
            return response()->json([
                'error' => 'Blog post not found'
            ], 404);
        }

        return response()->json([
            'id' => $post->id,
            'slug' => $post->slug,
            'title' => $post->title,
            'excerpt' => $post->excerpt,
            'content' => $post->content,
            'category' => $post->blogCategory?->name,
            'author' => $post->author,
            'cover_image' => $this->resolveCoverImage($post->cover_image),
            'seo_title' => $post->seo_title,
            'seo_description' => $post->seo_description,
            'published_at' => $post->published_at?->toIso8601String(),
        ]);
    }

    /**
     * Resolve cover image path to full URL
     */
    private function resolveCoverImage($path)
    {
        if (empty($path)) return null;

        // Already a URL
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        // Already an absolute path (legacy static image)
        if (str_starts_with($path, '/')) {
            return $path;
        }

        // Storage path — resolve to URL
        return Storage::disk('public_media')->url($path);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Get all active/published courses
     */
    public function index(Request $request)
    {
        $courses = Course::published()
            ->orderBy('sort_order')
            ->orderBy('next_date')
            ->get();

        return response()->json($courses->map(function ($course) {
            return $this->formatCourse($course);
        }));
    }

    /**
     * Get a single course by slug
     */
    public function show($slug)
    {
        $course = Course::where('slug', $slug)
            ->published()
            ->first();

        if (!$course) {
            return response()->json(['error' => 'Course not found'], 404);
        }

        return response()->json($this->formatCourse($course, full: true));
    }

    /**
     * Format course for API response
     */
    private function formatCourse(Course $course, bool $full = false): array
    {
        $data = [
            'id' => $course->id,
            'slug' => $course->slug,
            'title' => $course->title,
            'subtitle' => $course->subtitle,
            'description' => $course->description,
            'duration' => $course->duration,
            'sessions' => $course->sessions,
            'participants' => $course->max_participants ? $course->max_participants . ' Teilnehmer' : null,
            'price' => $course->price ? 'CHF ' . number_format((float)$course->price, 0, '.', "'") . '.-' : null,
            'nextDate' => $course->next_date,
            'highlights' => $course->highlights ?? [],
            'target' => $course->target_audience,
            'isFullyBooked' => $course->is_fully_booked,
            'bookingUrl' => $course->booking_url,
            'cover_image' => $this->resolveImage($course->cover_image),
            'status' => $course->status,
        ];

        if ($full) {
            $data['seo_title'] = $course->seo_title;
            $data['seo_description'] = $course->seo_description;
        }

        return $data;
    }

    /**
     * Resolve cover image path to full URL
     */
    private function resolveImage($path)
    {
        if (empty($path)) return null;
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }
        if (str_starts_with($path, '/')) {
            return $path;
        }
        return Storage::disk('public_media')->url($path);
    }
}

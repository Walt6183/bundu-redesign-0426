<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\GlobalController;
use App\Http\Controllers\Api\BlogPostController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\MediaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ==========================================
// Public API routes
// ==========================================

// Health Check
Route::get('/ping', [PageController::class, 'ping']);

// Pages
Route::get('/pages/{slug}', [PageController::class, 'show']);

// Globals
Route::get('/globals', [GlobalController::class, 'index']);
Route::get('/globals/{key}', [GlobalController::class, 'show']);

// Blog Posts
Route::get('/blog', [BlogPostController::class, 'index']);
Route::get('/blog/{slug}', [BlogPostController::class, 'show']);

// Courses
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{slug}', [CourseController::class, 'show']);

// Media
Route::get('/media', [MediaController::class, 'index']);
Route::get('/media/{id}', [MediaController::class, 'show']);

// Contact Form
Route::post('/contact', [ContactController::class, 'send']);

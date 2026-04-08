<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->longText('description')->nullable();
            $table->string('duration')->nullable();          // z.B. "8 Wochen"
            $table->string('sessions')->nullable();           // z.B. "16 Sessions"
            $table->unsignedInteger('max_participants')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->date('next_date')->nullable();
            $table->json('highlights')->nullable();           // JSON array von Strings
            $table->text('target_audience')->nullable();
            $table->string('booking_url')->nullable();
            $table->enum('status', ['draft', 'active', 'fully_booked', 'archived'])->default('draft');
            $table->string('cover_image')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

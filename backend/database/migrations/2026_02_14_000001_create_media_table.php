<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_path');
            $table->string('file_name');
            $table->string('file_type', 20)->default('document'); // image, document, video, audio
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('file_size')->default(0);
            $table->string('alt_text')->nullable();
            $table->text('description')->nullable();
            $table->string('disk', 20)->default('public');
            $table->timestamps();

            $table->index('file_type');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};

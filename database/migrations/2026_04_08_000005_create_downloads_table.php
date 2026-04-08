<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->string('titel');
            $table->text('beschreibung')->nullable();
            $table->string('datei')->nullable();
            $table->string('zielgruppe')->nullable(); // eltern, fachpersonen, institutionen
            $table->string('kategorie')->nullable(); // checkliste, leitfaden, arbeitsblatt, ebook
            $table->boolean('aktiv')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('downloads');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('themen', function (Blueprint $table) {
            $table->id();
            $table->string('titel');
            $table->string('slug')->unique();
            $table->json('zielgruppen')->nullable(); // ['eltern', 'fachpersonen', 'institutionen']
            $table->text('einleitung')->nullable();
            $table->longText('problem')->nullable();
            $table->longText('loesungsansatz')->nullable();
            $table->string('meta_titel')->nullable();
            $table->text('meta_beschreibung')->nullable();
            $table->string('featured_image')->nullable();
            $table->boolean('aktiv')->default(true);
            $table->timestamps();
        });

        // Pivot-Tabelle: Thema ↔ Angebot
        Schema::create('angebot_thema', function (Blueprint $table) {
            $table->id();
            $table->foreignId('angebot_id')->constrained('angebote')->cascadeOnDelete();
            $table->foreignId('thema_id')->constrained('themen')->cascadeOnDelete();
            $table->unique(['angebot_id', 'thema_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('angebot_thema');
        Schema::dropIfExists('themen');
    }
};

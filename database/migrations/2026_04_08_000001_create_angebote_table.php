<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('angebote', function (Blueprint $table) {
            $table->id();
            $table->string('titel');
            $table->string('slug')->unique();
            $table->json('zielgruppe')->nullable(); // ['eltern', 'fachpersonen', 'institutionen']
            $table->text('kurzbeschreibung')->nullable();
            $table->longText('nutzen')->nullable();
            $table->longText('fuer_wen')->nullable();
            $table->longText('inhalte')->nullable();
            $table->longText('ablauf')->nullable();
            $table->string('preis_info')->nullable();
            $table->string('cta_text')->nullable();
            $table->string('cta_url')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('faqs')->nullable(); // [{frage, antwort}, ...]
            $table->string('meta_titel')->nullable();
            $table->text('meta_beschreibung')->nullable();
            $table->boolean('aktiv')->default(true);
            $table->integer('sortierung')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('angebote');
    }
};

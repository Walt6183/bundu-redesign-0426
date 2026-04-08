<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('impulse', function (Blueprint $table) {
            $table->id();
            $table->string('titel');
            $table->string('slug')->unique();
            $table->string('kategorie')->nullable(); // eltern, fachpersonen, institutionen, neue-autoritaet, konflikt, gewaltpraevention, allgemein
            $table->string('autor')->default('Walter Uehli');
            $table->date('datum')->nullable();
            $table->text('intro')->nullable();
            $table->longText('inhalt')->nullable();
            $table->json('key_takeaways')->nullable(); // ["Takeaway 1", "Takeaway 2", ...]
            $table->text('lead_box_text')->nullable();
            $table->string('lead_box_cta')->nullable();
            $table->json('tags')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('meta_titel')->nullable();
            $table->text('meta_beschreibung')->nullable();
            $table->boolean('aktiv')->default(true);
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('impulse');
    }
};

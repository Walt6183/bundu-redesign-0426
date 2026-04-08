<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Kontaktanfragen (aus bundu-institutionen übernommen)
        Schema::create('kontakt_anfragen', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 320);
            $table->string('ich_bin')->nullable(); // privatperson, fachperson, institution
            $table->string('institution')->nullable();
            $table->string('interesse')->nullable();
            $table->string('betreff')->nullable();
            $table->text('nachricht')->nullable();
            $table->enum('status', ['neu', 'gelesen', 'beantwortet', 'archiviert'])->default('neu');
            $table->boolean('datenschutz_akzeptiert')->default(false);
            $table->timestamps();
        });

        // Kursanmeldungen (aus bundu-institutionen übernommen)
        Schema::create('kursanmeldungen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('angebot_id')->nullable()->constrained('angebote')->nullOnDelete();
            $table->string('kurstermin');
            $table->integer('teilnehmer_anzahl');
            $table->string('institution');
            $table->string('kontaktperson');
            $table->string('kontakt_email', 320);
            $table->text('bemerkungen')->nullable();
            $table->enum('status', ['ausstehend', 'bestaetigt', 'storniert'])->default('ausstehend');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kursanmeldungen');
        Schema::dropIfExists('kontakt_anfragen');
    }
};

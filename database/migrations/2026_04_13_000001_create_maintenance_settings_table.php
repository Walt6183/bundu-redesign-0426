<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('maintenance_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('enabled')->default(false);
            $table->enum('mode', ['countdown', 'maintenance'])->default('maintenance');
            $table->dateTime('countdown_target')->nullable();
            $table->string('headline')->default('Wir sind bald zurück');
            $table->text('message')->nullable();
            $table->timestamps();
        });

        // Insert default row
        DB::table('maintenance_settings')->insert([
            'enabled' => false,
            'mode' => 'maintenance',
            'headline' => 'Wir sind bald zurück',
            'message' => 'Unsere Website wird gerade überarbeitet. Bitte schauen Sie später wieder vorbei.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('maintenance_settings');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Migriert bestehende blog_posts in die neue impulse-Tabelle.
     * Original-Tabellen bleiben erhalten (kein Datenverlust).
     */
    public function up(): void
    {
        // Seitentyp-Spalte zur bestehenden pages-Tabelle hinzufügen
        Schema::table('pages', function (Blueprint $table) {
            $table->string('seitentyp')->default('allgemein')->after('slug');
            // homepage, zielgruppe, angebot, thema, impuls, allgemein
            $table->string('zielgruppe')->nullable()->after('seitentyp');
            // alle, eltern, fachpersonen, institutionen
        });

        // Blog-Posts in Impulse kopieren (wenn blog_posts Tabelle existiert)
        if (Schema::hasTable('blog_posts') && Schema::hasTable('impulse')) {
            $blogPosts = DB::table('blog_posts')->get();

            foreach ($blogPosts as $post) {
                DB::table('impulse')->insert([
                    'titel' => $post->title,
                    'slug' => $post->slug,
                    'kategorie' => 'allgemein',
                    'autor' => $post->author ?? 'Walter Uehli',
                    'datum' => $post->published_at,
                    'intro' => $post->excerpt,
                    'inhalt' => $post->content,
                    'featured_image' => $post->cover_image,
                    'meta_titel' => $post->seo_title,
                    'meta_beschreibung' => $post->seo_description,
                    'aktiv' => $post->status === 'published',
                    'featured' => false,
                    'created_at' => $post->created_at,
                    'updated_at' => $post->updated_at,
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['seitentyp', 'zielgruppe']);
        });

        // Impulse-Einträge die von Blog kamen, werden nicht zurückmigriert
        // (Blog-Tabelle bleibt unverändert)
    }
};

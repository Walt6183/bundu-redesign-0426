<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Create the blog_categories table
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // 2. Seed default categories (including existing ones and new "Eltern-News der Woche")
        $categories = [
            'Erziehungswissen',
            'Neue Autorität',
            'Systemik',
            'Familienberatung',
            'Praxistipps',
            'Allgemein',
            'Eltern-News der Woche',
        ];

        $now = now();
        foreach ($categories as $name) {
            DB::table('blog_categories')->insert([
                'name' => $name,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // 3. Add category_id column to blog_posts
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('category');
        });

        // 4. Migrate existing string categories to category_id
        $blogPosts = DB::table('blog_posts')->whereNotNull('category')->get();
        foreach ($blogPosts as $post) {
            $category = DB::table('blog_categories')->where('name', $post->category)->first();
            if ($category) {
                DB::table('blog_posts')->where('id', $post->id)->update(['category_id' => $category->id]);
            }
        }

        // 5. Drop the old string category column and add foreign key
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->foreign('category_id')
                ->references('id')
                ->on('blog_categories')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Re-add string category column
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->string('category')->nullable()->after('content');
        });

        // Migrate category_id back to string
        $blogPosts = DB::table('blog_posts')->whereNotNull('category_id')->get();
        foreach ($blogPosts as $post) {
            $category = DB::table('blog_categories')->where('id', $post->category_id)->first();
            if ($category) {
                DB::table('blog_posts')->where('id', $post->id)->update(['category' => $category->name]);
            }
        }

        // Drop category_id column
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });

        // Drop the blog_categories table
        Schema::dropIfExists('blog_categories');
    }
};

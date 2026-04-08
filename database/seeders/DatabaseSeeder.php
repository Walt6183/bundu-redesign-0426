<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@bundu.ch'],
            [
                'name' => 'Walter Uehli',
                'password' => bcrypt('changeme123'),
            ]
        );

        // Call all content seeders
        $this->call([
            GlobalSeeder::class,
            PageSeeder::class,
            BlogCategorySeeder::class,
            BlogPostSeeder::class,
            ContentSeeder::class,
        ]);
    }
}

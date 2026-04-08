<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Erziehungswissen',
            'Neue Autorität',
            'Systemik',
            'Familienberatung',
            'Praxistipps',
            'Allgemein',
            'Eltern-News der Woche',
        ];

        foreach ($categories as $name) {
            BlogCategory::firstOrCreate(['name' => $name]);
        }
    }
}

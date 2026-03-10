<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Puzzle',
                'slug' => 'puzzle',
            ],
            [
                'name' => 'Memory',
                'slug' => 'memory',
            ],
            [
                'name' => 'Coloring',
                'slug' => 'coloring',
            ],
            [
                'name' => 'Brain',
                'slug' => 'brain',
            ],
            [
                'name' => 'Logic',
                'slug' => 'logic',
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::factory()->create([
            'name' => 'Self Improvement',
            'slug' => 'self-improvement'
        ]);

        Category::factory()->create([
            'name' => 'Filosofi',
            'slug' => 'filosofi'
        ]);
    }
}

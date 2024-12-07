<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Article;
use App\Models\Rating;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
            ->count(6)
            ->has(
                Article::factory()
                    ->count(10)
                    ->hasComments(5)
                    ->hasRatings(5),
            )
            ->create();
    }
}

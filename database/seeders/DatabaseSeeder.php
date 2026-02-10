<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
           AdminUserSeeder::class,
           ProductCategorySeeder::class,
            SpecialisteSeeder::class,
            ProductSeeder::class,
            ProSeeder::class,
            SliderSeeder::class,
            BlogArticleSeeder::class,
            KeywordSeeder::class,
        ]);
    }
}

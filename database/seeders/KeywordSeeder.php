<?php

namespace Database\Seeders;

use App\Models\Deroulant;
use Illuminate\Database\Seeder;
use App\Models\Keyword;

class KeywordSeeder extends Seeder
{
    public function run(): void
    {
        $keywords = [
            ['title' => 'Orthopédie'],
            ['title' => 'Bandages'],
            ['title' => 'Semelles'],
            ['title' => 'Prothèses'],
            // Add 4 more keywords here...
        ];

        foreach ($keywords as $keyword) {
            Deroulant::create($keyword);
        }
    }
}

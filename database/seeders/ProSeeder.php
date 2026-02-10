<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pro;

class ProSeeder extends Seeder
{
    public function run(): void
    {
        $pros = [
            ['title' => 'Bandagisterie Dupont', 'description' => 'Spécialisée en orthopédie', 'category' => 'Bandagisterie', 'subtitle' => 'Soins sur mesure', 'file_1' => null, 'file_2' => null, 'external_link' => 'https://dupontbandagisterie.fr', 'image' => 'confortho2.jpg'],
            ['title' => 'Orthopédie Lambert', 'description' => 'Expert en semelles orthopédiques', 'category' => 'Orthopédie', 'subtitle' => 'Semelles personnalisées', 'file_1' => null, 'file_2' => null, 'external_link' => 'https://lambertorthopedie.fr', 'image' => 'confortho2.jpg'],
            // Add 8 more professionals here...
        ];

        foreach ($pros as $pro) {
            Pro::create($pro);
        }
    }
}

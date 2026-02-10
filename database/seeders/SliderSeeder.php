<?php

namespace Database\Seeders;

use App\Models\Slide;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            ['title' => 'Offre spéciale', 'category' => 'Promotion', 'short_description' => 'Profitez de nos offres exceptionnelles', 'image' => 'confortho2.jpg'],
            ['title' => 'Nouveautés', 'category' => 'Nouveautés', 'short_description' => 'Découvrez nos nouveaux produits', 'image' => 'confortho2.jpg'],
            // Add 3 more sliders here...
        ];

        foreach ($sliders as $slider) {
            Slide::create($slider);
        }
    }
}

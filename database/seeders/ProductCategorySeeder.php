<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Orthèses & bandages',
            'Semelles',
            'Chaussures orthopédiques',
            'Orthèses d\'assise',
            'Prothèses',
            'Aides à la mobilité',
            'Vêtements de compression',
            'Prothèses mammaires',
            'Pédiatrie',
            'Colonne vertébrale',
            'Médecine du sport',
            'Remplacement total des articulations',
            'Traumatologie',
            'Membre supérieur',
            'Chiropratique',
            'Gestion interventionnelle de la douleur',
            'Rééducation & Médecine Physique',
            'Podologie',
            'Rhumatologie',
            'Éducation des patients',
        ];

        foreach ($categories as $category) {
            ProductCategory::create([
                'title' => $category,
                'slug' => Str::slug($category),
                'description' => 'Description par défaut',  // Provide a default description
                'picture' => 'confortho2.jpg',  // Using the image from the public folder
            ]);
        }
    }
}

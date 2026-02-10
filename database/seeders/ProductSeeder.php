<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['title' => 'Orthèse du genou', 'slug' => 'orthese-genou', 'product_category_id' => 1, 'picture' => 'confortho2.jpg', 'description' => '<p>Une orthèse de genou de qualité</p>', 'mettre_en_avant' => 1, 'afficher' => 1],
            ['title' => 'Semelles orthopédiques', 'slug' => 'semelles-orthopediques', 'product_category_id' => 2, 'picture' => 'confortho2.jpg', 'description' => '<p>Semelles confortables pour tous</p>', 'mettre_en_avant' => 0, 'afficher' => 1],
            ['title' => 'Chaussures orthopédiques pour enfants', 'slug' => 'chaussures-orthopediques-enfants', 'product_category_id' => 3, 'picture' => 'confortho2.jpg', 'description' => '<p>Chaussures conçues pour les enfants</p>', 'mettre_en_avant' => 0, 'afficher' => 1],
            // Add more products here for each category...
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

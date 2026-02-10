<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Les nouvelles tendances en orthopédie',
                'category' => 'Orthopédie',
                'image' => 'confortho2.jpg',  // Using the image from the public folder
                'date' => '2024-09-25',
                'user_name' => 'Durand',
                'user_firstname' => 'Jean',
                'content' => '<p>Découvrez les dernières avancées</p>',
                'slug' => Str::slug('nouvelles tendances orthopedie'),
            ],
            [
                'title' => 'L\'importance des semelles orthopédiques',
                'category' => 'Semelles',
                'image' => 'confortho2.jpg',  // Using the image from the public folder
                'date' => '2024-09-27',
                'user_name' => 'Martin',
                'user_firstname' => 'Sophie',
                'content' => '<p>Pourquoi opter pour des semelles sur mesure</p>',
                'slug' => Str::slug('importance semelles orthopediques'),
            ],
            [
                'title' => 'Rééducation après une prothèse',
                'category' => 'Prothèses',
                'image' => 'confortho2.jpg',  // Using the image from the public folder
                'date' => '2024-09-28',
                'user_name' => 'Lefevre',
                'user_firstname' => 'Claire',
                'content' => '<p>Les étapes clés de la rééducation après une prothèse</p>',
                'slug' => Str::slug('reeducation apres prothese'),
            ],
        ];

        foreach ($articles as $article) {
            Blog::create($article);
        }
    }
}

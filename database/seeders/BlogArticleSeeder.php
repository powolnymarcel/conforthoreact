<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Chez Confortho, on fait aussi des protheses !',
                'category' => 'Protheses',
                'image' => '619249922_1224817939749981_2723885265426004236_n.jpg',
                'date' => '2026-02-01',
                'user_name' => 'Confortho',
                'user_firstname' => 'Team',
                'content' => <<<'HTML'
<p>✨ Chez Confortho, on fait aussi des protheses ! ✨🦿🦾</p>
<p>Et derriere ce service, il y a Baptiste 👨🏽‍🔧</p>
<p>Notre expert qui s'occupe de tout, de la conception a l'ajustement, avec precision et bonne humeur 😎</p>
<p>Du sur-mesure, du savoir-faire et beaucoup d'attention pour que chaque prothese rime avec confort et mobilite 🫶🏼</p>
<p>👉 Besoin d'une prothese ? C'est Baptiste qui s'en occupe 💪</p>
<p>N'hesitez pas a nous contacter au 04/263.53.73 pour toutes questions ou prise de rendez-vous 😬</p>
<p>📍 Voie de l'Ardenne 87, 4053 Embourg<br>📍 Rue du Vivier 30, 6900 Aye</p>
<p>#Confortho #Protheses #SurMesure #Expertise #Confort #Mobilite #TeamConfortho</p>
HTML,
            ],
            [
                'title' => 'Mercotte valide le Fllow de Paingone',
                'category' => 'Bonne circulation',
                'image' => '542750157_1116399123925197_8784994491120483025_n.jpg',
                'date' => '2026-02-04',
                'user_name' => 'Confortho',
                'user_firstname' => 'Team',
                'content' => <<<'HTML'
<p>🥐✨ Quand Mercotte n'est pas en train de juger des religieuses trop molles ou des biscuits pas assez croustillants, elle a trouve une nouvelle "recette miracle"...</p>
<p>👉 Le Fllow de Paingone !</p>
<p>Au menu :</p>
<ul>
    <li>✔️ Zero levure, zero four</li>
    <li>✔️ Juste un appareil qui booste la circulation et soulage les jambes lourdes</li>
    <li>✔️ Et cerise sur le gateau... il est disponible a la location 🥳</li>
</ul>
<p>Mercotte valide : "Ca ne fait pas monter les blancs en neige, mais ca fait redescendre les douleurs !"</p>
<p>Alors, qui est partant pour tester la nouvelle "recette" anti-jambes lourdes ? 🍰🦵⚡</p>
<p>Disponible dans vos deux magasins Confortho ! 🥰</p>
<p>A bientot ! ✨</p>
<p>#Paingone #Fllow #Mercotte #TeamPatisserieSansDouleurs #BonneCirculation #bonnecirculation #bonnecirculationsanguine #bonnecirculationsang</p>
HTML,
            ],
            [
                'title' => 'Bottes de pressotherapie disponibles chez Confortho',
                'category' => 'Pressotherapie',
                'image' => '536190668_1105421961689580_2010552544677013912_n.jpg',
                'date' => '2026-02-07',
                'user_name' => 'Confortho',
                'user_firstname' => 'Team',
                'content' => <<<'HTML'
<p>✨ Offrez a vos jambes une vraie seance de spa avec les bottes de pressotherapie disponibles chez Confortho !</p>
<p>👉 La pressotherapie, c'est bien plus qu'un simple moment de detente :</p>
<ul>
    <li>✅ Elle stimule la circulation sanguine et lymphatique</li>
    <li>✅ Aide a reduire la retention d'eau et la cellulite</li>
    <li>✅ Soulage les jambes lourdes et fatiguees</li>
    <li>✅ Accelere la recuperation musculaire apres le sport</li>
    <li>✅ Procure une sensation de legerete immediate 🕊️</li>
</ul>
<p>Et le petit bonus... vous pouvez meme profiter d'une serie ou d'un bon livre pendant la seance (attention, risque eleve d'endormissement 😴)</p>
<p>👉 Disponibles chez Confortho :</p>
<ul>
    <li>✔️ A la location : testez-les tranquillement chez vous</li>
    <li>✔️ A la vente : adoptez-les pour en profiter au quotidien</li>
</ul>
<p>Avec les bottes de pressotherapie, vos jambes passent en mode legerete et bien-etre... pretes a vous porter partout, sauf peut-etre sur la Lune 🚀🥲</p>
<p>N'hesitez pas a nous contacter pour plus d'informations 🥳</p>
<p>A bientot ! 🤩</p>
HTML,
            ],
            [
                'title' => 'Luminettes disponibles chez Confortho',
                'category' => 'Luminotherapie',
                'image' => 'valentines-day-bg-main-1.png',
                'date' => '2026-02-10',
                'user_name' => 'Confortho',
                'user_firstname' => 'Team',
                'content' => <<<'HTML'
<p>Disponible chez Confortho ! Venez tester les luminettes, aussi disponibles a la location 👌🏼</p>
<p>Vous pouvez essayer les appareils directement chez nous pour voir ce qui vous convient le mieux (Luminette 3, Luminette 2 ou Drive).</p>
<p>En pratique :</p>
<ul>
    <li>✔️ Test possible en magasin</li>
    <li>✔️ Disponibles a la location</li>
    <li>✔️ Conseils personnalises pour choisir votre solution de luminotherapie</li>
</ul>
<p>Objectif : retrouver plus d'energie, mieux reguler votre sommeil et mieux vivre la periode hivernale, avec un appareil simple a utiliser au quotidien.</p>
<p>Passez nous voir dans vos magasins Confortho pour un essai et plus d'informations.</p>
HTML,
            ],
        ];

        foreach ($articles as $article) {
            $article['slug'] = Str::slug($article['title']);
            $this->copyImageToStorage($article['image']);

            Blog::updateOrCreate(
                ['slug' => $article['slug']],
                $article
            );
        }
    }

    private function copyImageToStorage(string $image): void
    {
        $sourcePath = public_path($image);
        $destinationPath = storage_path('app/public/' . $image);

        if (!File::exists($sourcePath) || File::exists($destinationPath)) {
            return;
        }

        File::ensureDirectoryExists(dirname($destinationPath));
        File::copy($sourcePath, $destinationPath);
    }
}

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
                'title' => 'Chez Confortho, on fait aussi des prothèses !',
                'category' => 'Prothèses',
                'image' => '619249922_1224817939749981_2723885265426004236_n.jpg',
                'date' => '2026-02-01',
                'user_name' => 'Confortho',
                'user_firstname' => 'Team',
                'content' => <<<'HTML'
<p>✨ Chez Confortho, on fait aussi des prothèses ! ✨🦿🦾</p>
<p>Et derrière ce service, il y a Baptiste 👨🏽‍🔧</p>
<p>Notre expert qui s’occupe de tout, de la conception à l’ajustement, avec précision et bonne humeur 😎</p>
<p>Du sur-mesure, du savoir-faire et beaucoup d’attention pour que chaque prothèse rime avec confort et mobilité 🫶🏼</p>
<p>👉 Besoin d’une prothèse ?</p>
<p>C’est Baptiste qui s’en occupe 💪</p>
<p>N’hésitez pas à nous contacter au 04/263.53.73 pour toutes questions ou prise de rendez-vous 😬</p>
<p>📍Voie de l’Ardenne 87<br>4053 Embourg<br>📍 Rue du Vivier 30<br>6900 Aye</p>
<p>#Confortho #Prothèses #SurMesure #Expertise #Confort #Mobilité #TeamConfortho</p>
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
<p>🥐✨ Quand Mercotte n’est pas en train de juger des religieuses trop molles ou des biscuits pas assez croustillants, elle a trouvé une nouvelle “recette miracle”…</p>
<p>👉 Le Fllow de Paingone !</p>
<p>Au menu :</p>
<ul>
    <li>✔️ Zéro levure, zéro four</li>
    <li>✔️ Juste un appareil qui booste la circulation et soulage les jambes lourdes</li>
    <li>✔️ Et cerise sur le gâteau… il est disponible à la location 🥳</li>
</ul>
<p>Mercotte valide : « Ça ne fait pas monter les blancs en neige, mais ça fait redescendre les douleurs ! »</p>
<p>Alors, qui est partant pour tester la nouvelle “recette” anti-jambes lourdes ? 🍰🦵⚡</p>
<p>Disponible dans vos deux magasins Confortho ! 🥰</p>
<p>À bientôt ! ✨</p>
<p>#Paingone #Fllow #Mercotte #TeamPatisserieSansDouleurs #BonneCirculation #bonnecirculation #bonnecirculationsanguine #bonnecirculationsang</p>
HTML,
            ],
            [
                'title' => 'Bottes de pressothérapie disponibles chez Confortho',
                'category' => 'Pressothérapie',
                'image' => '536190668_1105421961689580_2010552544677013912_n.jpg',
                'date' => '2026-02-07',
                'user_name' => 'Confortho',
                'user_firstname' => 'Team',
                'content' => <<<'HTML'
<p>✨ Offrez à vos jambes une vraie séance de spa avec les bottes de pressothérapie disponible chez Confortho!</p>
<p>👉 La pressothérapie, c’est bien plus qu’un simple moment de détente :</p>
<ul>
    <li>✅ Elle stimule la circulation sanguine et lymphatique</li>
    <li>✅ Aide à réduire la rétention d’eau et la cellulite</li>
    <li>✅ Soulage les jambes lourdes et fatiguées</li>
    <li>✅ Accélère la récupération musculaire après le sport</li>
    <li>✅ Procure une sensation de légèreté immédiate 🕊️</li>
</ul>
<p>Et le petit bonus… vous pouvez même profiter d’une série ou d’un bon livre pendant la séance (attention, risque élevé d’endormissement 😴)</p>
<p>👉 Disponibles chez Confortho :</p>
<ul>
    <li>✔️ À la location : testez-les tranquillement chez vous</li>
    <li>✔️ À la vente : adoptez-les pour en profiter au quotidien</li>
</ul>
<p>Avec les bottes de pressothéraphie, vos jambes passent en mode légèreté et bien-être… prêtes à vous porter partout, sauf peut-être sur la Lune 🚀🥲</p>
<p>N’hésitez pas à nous contacter pour plus d’informations 🥳</p>
<p>À bientôt! 🤩</p>
HTML,
            ],
            [
                'title' => 'Luminettes disponibles chez Confortho',
                'category' => 'Luminothérapie',
                'image' => 'valentines-day-bg-main-1.png',
                'date' => '2026-02-10',
                'user_name' => 'Confortho',
                'user_firstname' => 'Team',
                'content' => <<<'HTML'
<p>Disponible chez Confortho!</p>
<p>Venez tester les luminettes, aussi disponible à la location 👌🏼</p>
<p>Chez Confortho, vous pouvez tester la Luminette directement en magasin pour voir ce qui vous convient le mieux, avec accompagnement personnalisé.</p>
<ul>
    <li>✔️ Test possible en magasin</li>
    <li>✔️ Disponible à la location</li>
    <li>✔️ Conseils personnalisés pour choisir votre appareil</li>
</ul>
<p>Vous pouvez choisir entre Luminette 3, Luminette 2 et Drive selon vos besoins, avec une solution simple pour retrouver de l’énergie, mieux réguler le sommeil et mieux vivre la période hivernale.</p>
<p>Passer en magasin pour un essai et plus d’informations.</p>
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

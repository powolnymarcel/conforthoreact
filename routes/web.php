<?php

use App\Models\Blog;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slide;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $slides = Slide::all();
    $categoriesproducts = ProductCategory::orderBy('title', 'asc')->get();
    $specialistes = \App\Models\Specialiste::get();
    $blogarticles = \App\Models\Blog::orderBy('date', 'asc')->get();
    $deroulants = \App\Models\Deroulant::get();

    $setting5=\App\Models\Setting::whereId(5)->get();
    $setting6=\App\Models\Setting::whereId(6)->get();
    $section1= \App\Models\Section1::all();
    $section2= \App\Models\Section2::all();
    $section3= \App\Models\Section3::all();
    $section4= \App\Models\Section4::all();

    return view('home', [
        'setting5' => $setting5,
        'setting6' => $setting6,
        'slides' => $slides,
        'specialistes' => $specialistes,
        'categoriesproducts' => $categoriesproducts,
        'deroulants' => $deroulants,
        'blogarticles' => $blogarticles,
        'section1s' => $section1,
        'section2s' => $section2,
        'section3s' => $section3,
        'section4s' => $section4,
    ]);
})->name('home');
Route::get('/competences-and-savoir-faire', function () {
   $slides = Slide::all();
    $categoriesproducts = ProductCategory::orderBy('title', 'asc')->get();
    $categories = \App\Models\ProductCategory::with('products')->orderBy("title")->get();
    $blogarticles = \App\Models\Blog::orderBy('date', 'asc')->get();
    $deroulants = \App\Models\Deroulant::get();
    $setting5=\App\Models\Setting::whereId(5)->get();
    $setting6=\App\Models\Setting::whereId(6)->get();
    $section1= \App\Models\Section1::all();
    $section2= \App\Models\Section2::all();
    $section3= \App\Models\Section3::all();
    $section4= \App\Models\Section4::all();

    return view('competences', [
        'setting5' => $setting5,
        'setting6' => $setting6,
        'slides' => $slides,
        'categories' => $categories,
        'categoriesproducts' => $categoriesproducts,
        'deroulants' => $deroulants,
        'blogarticles' => $blogarticles,
        'section1s' => $section1,
        'section2s' => $section2,
        'section3s' => $section3,
        'section4s' => $section4,
    ]);
})->name('competences');

Route::get('/competences-and-savoir-faire/{slug}', function ($slug) {
    $slides = Slide::all();
    $categoriesproducts = ProductCategory::orderBy('title', 'asc')->get();
    $categories = \App\Models\ProductCategory::with('products')->orderBy("title")->get();

    $activeCategory = \App\Models\ProductCategory::where('slug', $slug)->with('products')->firstOrFail();

    $blogarticles = \App\Models\Blog::orderBy('date', 'asc')->get();
    $deroulants = \App\Models\Deroulant::get();

    $setting5 = \App\Models\Setting::whereId(5)->get();
    $setting6 = \App\Models\Setting::whereId(6)->get();
    $section1 = \App\Models\Section1::all();
    $section2 = \App\Models\Section2::all();
    $section3 = \App\Models\Section3::all();
    $section4 = \App\Models\Section4::all();

    return view('competencesdetails', [
        'categories' => $categories,
        'categoriesproducts' => $categoriesproducts,
        'activeCategory' => $activeCategory,
        'setting5' => $setting5,
        'setting6' => $setting6,
        'slides' => $slides,
        'deroulants' => $deroulants,
        'blogarticles' => $blogarticles,
        'section1s' => $section1,
        'section2s' => $section2,
        'section3s' => $section3,
        'section4s' => $section4,
    ]);
})->name('competencesdetails');


Route::get('/competences-and-savoir-faire/{slug}/produit/{slugprod}', function () {
    $slides = Slide::all();
    $categoriesproducts = ProductCategory::orderBy('title', 'asc')->get();
    $categories = \App\Models\ProductCategory::with('products')->orderBy("title")->get();
    $blogarticles = \App\Models\Blog::orderBy('date', 'asc')->get();
    $deroulants = \App\Models\Deroulant::get();

    $produit=Product::where('slug', request()->slugprod)->first();

    $setting5=\App\Models\Setting::whereId(5)->get();
    $setting6=\App\Models\Setting::whereId(6)->get();
    $section1= \App\Models\Section1::all();
    $section2= \App\Models\Section2::all();
    $section3= \App\Models\Section3::all();
    $section4= \App\Models\Section4::all();
    return view('produitdetails', [
        'produit' => $produit,
        'setting5' => $setting5,
        'setting6' => $setting6,
        'slides' => $slides,
        'categories' => $categories,
        'categoriesproducts' => $categoriesproducts,
        'deroulants' => $deroulants,
        'blogarticles' => $blogarticles,
        'section1s' => $section1,
        'section2s' => $section2,
        'section3s' => $section3,
        'section4s' => $section4,
    ]);
})->name('produitdetails');
Route::get('/professionnels', function () {
    $slides = Slide::all();
    $categoriesproducts = ProductCategory::orderBy('title', 'asc')->get();
    $specialistes = \App\Models\Specialiste::get();
    $blogarticles = \App\Models\Blog::orderBy('date', 'asc')->get();
    $deroulants = \App\Models\Deroulant::get();
    $pros = \App\Models\Pro::get();

    $setting5=\App\Models\Setting::whereId(5)->get();
    $setting6=\App\Models\Setting::whereId(6)->get();
    $section1= \App\Models\Section1::all();
    $section2= \App\Models\Section2::all();
    $section3= \App\Models\Section3::all();
    $section4= \App\Models\Section4::all();
    return view('pro', [
        'pros' => $pros,
        'setting5' => $setting5,
        'setting6' => $setting6,
        'slides' => $slides,
        'specialistes' => $specialistes,
        'categoriesproducts' => $categoriesproducts,
        'deroulants' => $deroulants,
        'blogarticles' => $blogarticles,
        'section1s' => $section1,
        'section2s' => $section2,
        'section3s' => $section3,
        'section4s' => $section4,
    ]);
})->name('professionnels');
Route::get('/a-propos', function () {
    $slides = Slide::all();
    $categoriesproducts = ProductCategory::orderBy('title', 'asc')->get();
    $specialistes = \App\Models\Specialiste::get();
    $blogarticles = \App\Models\Blog::orderBy('date', 'asc')->get();
    $deroulants = \App\Models\Deroulant::get();
    $apropos = \App\Models\APropos::first();

    $setting5=\App\Models\Setting::whereId(5)->get();
    $setting6=\App\Models\Setting::whereId(6)->get();
    $section1= \App\Models\Section1::all();
    $section2= \App\Models\Section2::all();
    $section3= \App\Models\Section3::all();
    $section4= \App\Models\Section4::all();

    return view('apropos', [
        'apropos' => $apropos,
        'setting5' => $setting5,
        'setting6' => $setting6,
        'slides' => $slides,
        'specialistes' => $specialistes,
        'categoriesproducts' => $categoriesproducts,
        'deroulants' => $deroulants,
        'blogarticles' => $blogarticles,
        'section1s' => $section1,
        'section2s' => $section2,
        'section3s' => $section3,
        'section4s' => $section4,
    ]);
})->name('propos');
Route::get('/blog', function () {
    $slides = Slide::all();
    $categoriesproducts = ProductCategory::orderBy('title', 'asc')->get();
    $specialistes = \App\Models\Specialiste::get();
    $blogarticles = \App\Models\Blog::orderBy('date', 'asc')->get();
    $deroulants = \App\Models\Deroulant::get();

    $setting5=\App\Models\Setting::whereId(5)->get();
    $setting6=\App\Models\Setting::whereId(6)->get();
    $section1= \App\Models\Section1::all();
    $section2= \App\Models\Section2::all();
    $section3= \App\Models\Section3::all();
    $section4= \App\Models\Section4::all();

    return view('blog', [
        'setting5' => $setting5,
        'setting6' => $setting6,
        'slides' => $slides,
        'specialistes' => $specialistes,
        'categoriesproducts' => $categoriesproducts,
        'deroulants' => $deroulants,
        'blogs' => $blogarticles,
        'section1s' => $section1,
        'section2s' => $section2,
        'section3s' => $section3,
        'section4s' => $section4,
    ]);
})->name('blog');
Route::get('/blog/{slug}', function () {
    $blog= Blog::where('slug', request('slug'))->firstOrFail();

    $slides = Slide::all();
    $categoriesproducts = ProductCategory::orderBy('title', 'asc')->get();
    $specialistes = \App\Models\Specialiste::get();
    $blogarticles = \App\Models\Blog::orderBy('date', 'asc')->get();
    $deroulants = \App\Models\Deroulant::get();

    $setting5=\App\Models\Setting::whereId(5)->get();
    $setting6=\App\Models\Setting::whereId(6)->get();
    $section1= \App\Models\Section1::all();
    $section2= \App\Models\Section2::all();
    $section3= \App\Models\Section3::all();
    $section4= \App\Models\Section4::all();

    return view('blogdetails', [
        'blog' => $blog,
        'setting5' => $setting5,
        'setting6' => $setting6,
        'slides' => $slides,
        'specialistes' => $specialistes,
        'categoriesproducts' => $categoriesproducts,
        'deroulants' => $deroulants,
        'blogs' => $blogarticles,
        'section1s' => $section1,
        'section2s' => $section2,
        'section3s' => $section3,
        'section4s' => $section4,
    ]);
})->name('blog.details');

use App\Http\Controllers\ContactController;
use Illuminate\Support\Str;

Route::get('/contact', function () {
    $slides = Slide::all();
    $categoriesproducts = ProductCategory::orderBy('title', 'asc')->get();
    $specialistes = \App\Models\Specialiste::get();
    $blogarticles = \App\Models\Blog::orderBy('date', 'asc')->get();
    $deroulants = \App\Models\Deroulant::get();

    $setting5=\App\Models\Setting::whereId(5)->get();
    $setting6=\App\Models\Setting::whereId(6)->get();

    $setting7=\App\Models\Setting::whereId(7)->get();
    $setting9=\App\Models\Setting::whereId(9)->get();
    $setting10=\App\Models\Setting::whereId(10)->get();
    $setting11=\App\Models\Setting::whereId(11)->get();
    $setting13=\App\Models\Setting::whereId(13)->get();
    $setting14=\App\Models\Setting::whereId(14)->get();
    $setting15=\App\Models\Setting::whereId(15)->get();

    $section1= \App\Models\Section1::all();
    $section2= \App\Models\Section2::all();
    $section3= \App\Models\Section3::all();
    $section4= \App\Models\Section4::all();

    // Honeypot: store dynamic field name in session
    $honeypotName = 'hp_' . Str::random(8);
    session(['honeypot_field' => $honeypotName]);

    // Anti-robot math challenge
    $a = rand(1, 9);
    $b = rand(1, 9);
    session(['antirobot_answer' => $a + $b]);

    return view('contact', [
        'honeypotName' => $honeypotName,
        'antirobotQuestion' => "Combien font $a + $b ?",
        'setting5' => $setting5,
        'setting6' => $setting6,
        'setting7' => $setting7,
        'setting9' => $setting9,
        'setting10' => $setting10,
        'setting11' => $setting11,
        'setting13' => $setting13,
        'setting14' => $setting14,
        'setting15' => $setting15,

        'slides' => $slides,
        'specialistes' => $specialistes,
        'categoriesproducts' => $categoriesproducts,
        'deroulants' => $deroulants,
        'blogarticles' => $blogarticles,
        'section1s' => $section1,
        'section2s' => $section2,
        'section3s' => $section3,
        'section4s' => $section4,
    ]);
})->name('contact');

Route::post('/contact-submit', [ContactController::class, 'submit'])
    ->middleware('throttle:5,1')
    ->name('contact.submit');

Route::get('/conditions-generales', function () {
    return view('conditions-generales');
})->name('conditions.generales');

Route::get('/politique-de-confidentialite', function () {
    return view('politique-confidentialite');
})->name('politique.confidentialite');

Route::get('/sitemap.xml', function () {
    $now = now()->toAtomString();

    $formatDate = static function ($value) use ($now): string {
        if ($value instanceof DateTimeInterface) {
            return $value->format(DATE_ATOM);
        }

        if (is_string($value) && $value !== '') {
            $timestamp = strtotime($value);
            if ($timestamp !== false) {
                return gmdate(DATE_ATOM, $timestamp);
            }
        }

        return $now;
    };

    $escape = static function (string $value): string {
        return htmlspecialchars($value, ENT_XML1 | ENT_QUOTES, 'UTF-8');
    };

    $urls = [
        ['loc' => url('/'), 'lastmod' => $now, 'changefreq' => 'weekly', 'priority' => '1.0'],
        ['loc' => route('competences'), 'lastmod' => $now, 'changefreq' => 'weekly', 'priority' => '0.9'],
        ['loc' => route('professionnels'), 'lastmod' => $now, 'changefreq' => 'weekly', 'priority' => '0.8'],
        ['loc' => route('propos'), 'lastmod' => $now, 'changefreq' => 'monthly', 'priority' => '0.8'],
        ['loc' => route('blog'), 'lastmod' => $now, 'changefreq' => 'daily', 'priority' => '0.8'],
        ['loc' => route('contact'), 'lastmod' => $now, 'changefreq' => 'monthly', 'priority' => '0.7'],
        ['loc' => route('conditions.generales'), 'lastmod' => $now, 'changefreq' => 'yearly', 'priority' => '0.4'],
        ['loc' => route('politique.confidentialite'), 'lastmod' => $now, 'changefreq' => 'yearly', 'priority' => '0.4'],
    ];

    foreach (ProductCategory::query()->whereNotNull('slug')->get(['slug', 'updated_at']) as $category) {
        $urls[] = [
            'loc' => route('competencesdetails', ['slug' => $category->slug]),
            'lastmod' => $formatDate($category->updated_at),
            'changefreq' => 'weekly',
            'priority' => '0.7',
        ];
    }

    foreach (
        Product::query()
            ->join('product_categories', 'product_categories.id', '=', 'products.product_category_id')
            ->whereNotNull('products.slug')
            ->whereNotNull('product_categories.slug')
            ->select('products.slug as product_slug', 'product_categories.slug as category_slug', 'products.updated_at')
            ->get() as $product
    ) {
        $urls[] = [
            'loc' => route('produitdetails', [
                'slug' => $product->category_slug,
                'slugprod' => $product->product_slug,
            ]),
            'lastmod' => $formatDate($product->updated_at),
            'changefreq' => 'weekly',
            'priority' => '0.6',
        ];
    }

    foreach (Blog::query()->whereNotNull('slug')->get(['slug', 'updated_at', 'date']) as $article) {
        $urls[] = [
            'loc' => route('blog.details', ['slug' => $article->slug]),
            'lastmod' => $formatDate($article->updated_at ?: $article->date),
            'changefreq' => 'monthly',
            'priority' => '0.7',
        ];
    }

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    foreach ($urls as $item) {
        $xml .= "  <url>\n";
        $xml .= '    <loc>' . $escape($item['loc']) . "</loc>\n";
        $xml .= '    <lastmod>' . $escape($item['lastmod']) . "</lastmod>\n";
        $xml .= '    <changefreq>' . $escape($item['changefreq']) . "</changefreq>\n";
        $xml .= '    <priority>' . $escape($item['priority']) . "</priority>\n";
        $xml .= "  </url>\n";
    }

    $xml .= "</urlset>\n";

    return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
});

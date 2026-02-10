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
    $honeypotName = 'honeypot_' . Str::random(5);

    return view('contact', [
        'honeypotName' => $honeypotName,
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


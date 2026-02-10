<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Specialiste;
use App\Models\Slide;
use App\Models\Pro;
use App\Models\Contact;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('dashboard', [
            'stats' => [
                'specialistes' => Specialiste::count(),
                'produits' => Product::count(),
                'categories' => ProductCategory::count(),
                'articles' => Blog::count(),
                'slides' => Slide::count(),
                'professionnels' => Pro::count(),
                'contacts' => Contact::count(),
            ],
        ]);
    }
}

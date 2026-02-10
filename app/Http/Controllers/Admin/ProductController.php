<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhereHas('category', fn ($q) => $q->where('title', 'like', "%{$search}%"));
            });
        }

        if ($sort = $request->input('sort')) {
            $query->orderBy($sort, $request->input('direction', 'asc'));
        } else {
            $query->latest();
        }

        return Inertia::render('produits/index', [
            'produits' => $query->paginate(15)->withQueryString(),
            'categories' => ProductCategory::orderBy('title')->get(['id', 'title']),
        ]);
    }

    public function create()
    {
        return Inertia::render('produits/create', [
            'categories' => ProductCategory::orderBy('title')->get(['id', 'title']),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_category_id' => 'required|exists:product_categories,id',
            'picture' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'mettre_en_avant' => 'boolean',
            'afficher' => 'boolean',
        ]);

        Product::create($validated);

        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit créé avec succès.');
    }

    public function edit(Product $produit)
    {
        return Inertia::render('produits/edit', [
            'produit' => $produit->load('category'),
            'categories' => ProductCategory::orderBy('title')->get(['id', 'title']),
        ]);
    }

    public function update(Request $request, Product $produit)
    {
        $validated = $request->validate([
            'product_category_id' => 'required|exists:product_categories,id',
            'picture' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'mettre_en_avant' => 'boolean',
            'afficher' => 'boolean',
        ]);

        $produit->update($validated);

        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(Product $produit)
    {
        $produit->delete();

        return redirect()->route('admin.produits.index')
            ->with('success', 'Produit supprimé avec succès.');
    }
}

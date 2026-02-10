<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($sort = $request->input('sort')) {
            $query->orderBy($sort, $request->input('direction', 'asc'));
        } else {
            $query->latest('date');
        }

        return Inertia::render('actualites/index', [
            'actualites' => $query->paginate(15)->withQueryString(),
        ]);
    }

    public function create()
    {
        return Inertia::render('actualites/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'date' => 'required|date',
            'user_name' => 'required|string|max:255',
            'user_firstname' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        Blog::create($validated);

        return redirect()->route('admin.actualites.index')
            ->with('success', 'Article créé avec succès.');
    }

    public function edit(Blog $actualite)
    {
        return Inertia::render('actualites/edit', [
            'actualite' => $actualite,
        ]);
    }

    public function update(Request $request, Blog $actualite)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'date' => 'required|date',
            'user_name' => 'required|string|max:255',
            'user_firstname' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        $actualite->update($validated);

        return redirect()->route('admin.actualites.index')
            ->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy(Blog $actualite)
    {
        $actualite->delete();

        return redirect()->route('admin.actualites.index')
            ->with('success', 'Article supprimé avec succès.');
    }
}

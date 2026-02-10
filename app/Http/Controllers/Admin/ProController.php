<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pro;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProController extends Controller
{
    public function index(Request $request)
    {
        $query = Pro::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($sort = $request->input('sort')) {
            $query->orderBy($sort, $request->input('direction', 'asc'));
        } else {
            $query->latest();
        }

        return Inertia::render('professionnels/index', [
            'professionnels' => $query->paginate(15)->withQueryString(),
        ]);
    }

    public function create()
    {
        return Inertia::render('professionnels/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'file_1' => 'nullable|string|max:255',
            'file_1_visible' => 'boolean',
            'file_2' => 'nullable|string|max:255',
            'file_2_visible' => 'boolean',
            'external_link' => 'nullable|url|max:255',
            'image' => 'required|string|max:255',
        ]);

        Pro::create($validated);

        return redirect()->route('admin.professionnels.index')
            ->with('success', 'Professionnel créé avec succès.');
    }

    public function edit(Pro $professionnel)
    {
        return Inertia::render('professionnels/edit', [
            'professionnel' => $professionnel,
        ]);
    }

    public function update(Request $request, Pro $professionnel)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'file_1' => 'nullable|string|max:255',
            'file_1_visible' => 'boolean',
            'file_2' => 'nullable|string|max:255',
            'file_2_visible' => 'boolean',
            'external_link' => 'nullable|url|max:255',
            'image' => 'required|string|max:255',
        ]);

        $professionnel->update($validated);

        return redirect()->route('admin.professionnels.index')
            ->with('success', 'Professionnel mis à jour avec succès.');
    }

    public function destroy(Pro $professionnel)
    {
        $professionnel->delete();

        return redirect()->route('admin.professionnels.index')
            ->with('success', 'Professionnel supprimé avec succès.');
    }
}

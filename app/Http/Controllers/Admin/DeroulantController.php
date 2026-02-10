<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deroulant;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DeroulantController extends Controller
{
    public function index(Request $request)
    {
        $query = Deroulant::query();

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($sort = $request->input('sort')) {
            $query->orderBy($sort, $request->input('direction', 'asc'));
        } else {
            $query->latest();
        }

        return Inertia::render('deroulants/index', [
            'deroulants' => $query->paginate(15)->withQueryString(),
        ]);
    }

    public function create()
    {
        return Inertia::render('deroulants/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Deroulant::create($validated);

        return redirect()->route('admin.deroulants.index')
            ->with('success', 'Déroulant créé avec succès.');
    }

    public function edit(Deroulant $deroulant)
    {
        return Inertia::render('deroulants/edit', [
            'deroulant' => $deroulant,
        ]);
    }

    public function update(Request $request, Deroulant $deroulant)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $deroulant->update($validated);

        return redirect()->route('admin.deroulants.index')
            ->with('success', 'Déroulant mis à jour avec succès.');
    }

    public function destroy(Deroulant $deroulant)
    {
        $deroulant->delete();

        return redirect()->route('admin.deroulants.index')
            ->with('success', 'Déroulant supprimé avec succès.');
    }
}

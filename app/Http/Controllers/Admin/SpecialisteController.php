<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialiste;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SpecialisteController extends Controller
{
    public function index(Request $request)
    {
        $query = Specialiste::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('firstname', 'like', "%{$search}%")
                  ->orWhere('job', 'like', "%{$search}%");
            });
        }

        if ($sort = $request->input('sort')) {
            $query->orderBy($sort, $request->input('direction', 'asc'));
        } else {
            $query->latest();
        }

        return Inertia::render('specialistes/index', [
            'specialistes' => $query->paginate(15)->withQueryString(),
        ]);
    }

    public function create()
    {
        return Inertia::render('specialistes/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'picture' => 'required|string|max:255',
            'job' => 'required|string|max:255',
        ]);

        Specialiste::create($validated);

        return redirect()->route('admin.specialistes.index')
            ->with('success', 'Spécialiste créé avec succès.');
    }

    public function edit(Specialiste $specialiste)
    {
        return Inertia::render('specialistes/edit', [
            'specialiste' => $specialiste,
        ]);
    }

    public function update(Request $request, Specialiste $specialiste)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'picture' => 'required|string|max:255',
            'job' => 'required|string|max:255',
        ]);

        $specialiste->update($validated);

        return redirect()->route('admin.specialistes.index')
            ->with('success', 'Spécialiste mis à jour avec succès.');
    }

    public function destroy(Specialiste $specialiste)
    {
        $specialiste->delete();

        return redirect()->route('admin.specialistes.index')
            ->with('success', 'Spécialiste supprimé avec succès.');
    }
}

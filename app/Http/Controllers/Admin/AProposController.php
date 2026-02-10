<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\APropos;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AProposController extends Controller
{
    public function index()
    {
        return Inertia::render('a-propos/index', [
            'items' => APropos::all(),
        ]);
    }

    public function edit(APropos $aPropos)
    {
        return Inertia::render('a-propos/edit', [
            'apropos' => $aPropos,
        ]);
    }

    public function update(Request $request, APropos $aPropos)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'sentences' => 'required|array|min:1',
            'sentences.*.sentence' => 'required|string',
            'image_1' => 'required|string|max:255',
            'image_2' => 'required|string|max:255',
        ]);

        $aPropos->update($validated);

        return redirect()->route('admin.a-propos.index')
            ->with('success', 'Page À propos mise à jour avec succès.');
    }
}

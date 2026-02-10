<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SlideController extends Controller
{
    public function index(Request $request)
    {
        $query = Slide::query();

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

        return Inertia::render('slides/index', [
            'slides' => $query->paginate(15)->withQueryString(),
        ]);
    }

    public function create()
    {
        return Inertia::render('slides/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'short_description' => 'required|string',
            'image' => 'required|string|max:255',
        ]);

        Slide::create($validated);

        return redirect()->route('admin.slides.index')
            ->with('success', 'Slide créé avec succès.');
    }

    public function edit(Slide $slide)
    {
        return Inertia::render('slides/edit', [
            'slide' => $slide,
        ]);
    }

    public function update(Request $request, Slide $slide)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'short_description' => 'required|string',
            'image' => 'required|string|max:255',
        ]);

        $slide->update($validated);

        return redirect()->route('admin.slides.index')
            ->with('success', 'Slide mis à jour avec succès.');
    }

    public function destroy(Slide $slide)
    {
        $slide->delete();

        return redirect()->route('admin.slides.index')
            ->with('success', 'Slide supprimé avec succès.');
    }
}

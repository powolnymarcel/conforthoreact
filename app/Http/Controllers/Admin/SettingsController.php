<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Outerweb\Settings\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = [];
        foreach (Setting::all() as $setting) {
            $settings[$setting->key] = $setting->value;
        }

        return Inertia::render('parametres/index', [
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'settings' => 'required|array',
        ]);

        foreach ($data['settings'] as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('admin.parametres.index')
            ->with('success', 'Paramètres mis à jour avec succès.');
    }
}

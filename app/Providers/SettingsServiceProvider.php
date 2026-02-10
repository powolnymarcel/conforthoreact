<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class SettingsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share settings globally with all views
        View::composer('*', function ($view) {
            $settings = [
                'setting5' => Setting::where('id', 5)->first(), // first() instead of get()
                'setting6' => Setting::where('id', 6)->first(),
                'setting7' => Setting::where('id', 7)->first(),
                'setting9' => Setting::where('id', 9)->first(),
                'setting10' => Setting::where('id', 10)->first(),
                'setting11' => Setting::where('id', 11)->first(),
                'setting13' => Setting::where('id', 13)->first(),
                'setting14' => Setting::where('id', 14)->first(),
                'setting15' => Setting::where('id', 15)->first(),
            ];

            $view->with('settings', $settings);
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Outerweb\Settings\Models\Setting;

class SettingsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $allSettings = [];
            foreach (Setting::all() as $setting) {
                $value = $setting->value;
                // Strip surrounding quotes if the value is a quoted string
                if (is_string($value)) {
                    $value = trim($value, '"');
                }
                $allSettings[$setting->key] = $value;
            }

            $view->with('allSettings', $allSettings);
        });
    }
}

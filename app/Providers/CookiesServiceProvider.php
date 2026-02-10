<?php

namespace App\Providers;

use Whitecube\LaravelCookieConsent\Consent;
use Whitecube\LaravelCookieConsent\Facades\Cookies;
use Whitecube\LaravelCookieConsent\CookiesServiceProvider as ServiceProvider;

class CookiesServiceProvider extends ServiceProvider
{
    /**
     * Define the cookies users should be aware of.
     */
    protected function registerCookies(): void
    {
            // Register Laravel's base cookies under the "required" cookies section:
            Cookies::essentials()
                ->session()
                ->csrf()
                ->name('cookie_consent') // Add a consent-tracking cookie
                ->description('Tracks whether the user has consented to cookies.')
                ->duration(60 * 24 * 365); // 1 year
    }
}

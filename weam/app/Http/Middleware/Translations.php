<?php

// TODO: error support

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Translations
{
    /**
     * Supported locales
     */
    private $supported;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->useLocale($request);

        return $next($request);
    }

    /**
     * Get translations for the current language and store it on session and app env
     */
    private function useLocale($request)
    {
        $translations = collect();

        $this->supported = array_diff(scandir(resource_path('lang')), array('.', '..'));

        $locale = session('settings.locale');

        if ($request->hasCookie('language')) {
            $locale = $request->cookie('language');
        }

        if ($locale === null || $this->supported === null || !in_array($locale, $this->supported)) {
            $locale = config('app.fallback_locale');
        }

        $request->session()->forget('settings.locale');
        session(['settings.locale' => $locale]);
        App::setLocale(config('app.locales_app_match')[$locale]);

        $translations = $this->phpTranslations($locale);

        $request->session()->forget('settings.translations');
        session(['settings.translations' => $translations]);
    }

    /**
     * Get translations from PHP files
     */
    private function phpTranslations($locale)
    {
        $path = resource_path("lang/$locale");

        return collect(File::allFiles($path))->flatMap(function ($file) use ($locale) {
            $key = ($translation = $file->getBasename('.php'));

            return [$key => trans($translation, [], $locale)];
        });
    }

    /**
     * Get translations from JSON files
     */
    private function jsonTranslations($locale)
    {
        $path = resource_path("lang/$locale.json");

        if (is_string($path) && is_readable($path)) {
            return json_decode(file_get_contents($path), true);
        }

        return [];
    }
}

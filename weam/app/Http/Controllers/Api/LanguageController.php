<?php

// TODO: pass language cookie creation on server-side
// TODO: error support

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class LanguageController extends Controller
{
    /**
     * Supported locale languages
     */
    private $supported;

    /**
     * Remove locale from session and insert the new locale
     */
    public function changeLanguage(Request $request, $locale)
    {
        $locale = preg_replace('/-/', '_', $locale);

        session()->has('settings.locale') ? App::setLocale(config('app.fallback_locale')) : App::setLocale(session('settings.locale'));

        if (session('settings.locale') !== $locale || App::getLocale() !== $locale) {
            $request->session()->forget('settings.locale');
            session(['settings.locale' => $locale]);

            $this->useLocale($request);
        }
    }

    /**
     * Get translations for the current language and store it on session and app env
     */
    private function useLocale($request)
    {
        $translations = collect();

        $this->supported = array_diff(scandir(resource_path('lang')), array('.', '..'));

        $locale = session('settings.locale');

        if ($locale === null || $this->supported === null || !in_array($locale, $this->supported)) {
            $request->session()->forget('settings.locale');
            session(['settings.locale' => config('app.fallback_locale')]);
        }

        App::setLocale(config('app.locales_app_match')[session('settings.locale')]);

        $translations = $this->phpTranslations(session('settings.locale'));

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

    /**
     * Display a listing of available codes language.
     *
     * @return \Illuminate\Http\Response
     */
    public function availableLanguagesCode()
    {
        $languages = array_diff(scandir(resource_path('lang')), array('.', '..'));
        return $languages !== null ? json_encode(['success' => $languages]) : json_encode(['error' => 'Unable to recover available languages']);
    }

    /**
     * Display a listing of available languages name and code.
     *
     * @return \Illuminate\Http\Response
     */
    public function availableLanguagesCodeAndLanguage()
    {
        $available = config('app.available_locales');
        return $available !== null ? json_encode(['success' => $available]) : json_encode(['error' => 'Unable to recover available languages']);
    }

    /**
     * Display the fallback locale language
     *
     * @return \Illuminate\Http\Response
     */
    public function defaultLanguage()
    {
        $default = config('app.fallback_locale');
        return $default !== null ? json_encode(['success' => $default]) : json_encode(['error' => 'Unable to recover default language']);
    }
}

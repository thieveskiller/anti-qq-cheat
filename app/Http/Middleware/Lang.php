<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Mcamara\LaravelLocalization\LanguageNegotiator;
use Mcamara\LaravelLocalization\Middleware\LaravelLocalizationMiddlewareBase;

class Lang extends LaravelLocalizationMiddlewareBase
{
    public function handle(Request $request, Closure $next)
    {
        // If the URL of the request is in exceptions.
        if ($this->shouldIgnore($request)) {
            return $next($request);
        }

        $locale = Cookie::get('locale');
        if(!$locale || !app('laravellocalization')->checkLocaleInSupportedLocales($locale)){
            $negotiator = new LanguageNegotiator(app('laravellocalization')->getDefaultLocale(), app('laravellocalization')->getSupportedLocales(), $request);
            $locale     = $negotiator->negotiateLanguage();
        }
        App::setLocale($locale);
        return $next($request);
    }
}

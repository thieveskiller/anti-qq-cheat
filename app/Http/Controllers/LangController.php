<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Mcamara\LaravelLocalization\LanguageNegotiator;

class LangController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param String $language
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function set($language,Request $request)
    {
        if(!$language || !app('laravellocalization')->checkLocaleInSupportedLocales($language)){
            $negotiator = new LanguageNegotiator(
                app('laravellocalization')->getDefaultLocale(),
                app('laravellocalization')->getSupportedLocales(),
                $request
            );
            $language     = $negotiator->negotiateLanguage();
        }
        Cookie::queue(cookie('locale',$language));
        return redirect()->back();
    }
}

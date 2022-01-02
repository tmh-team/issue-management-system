<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke($locale)
    {
        if (!in_array($locale, config('app.avaliable_locale'))) {
            $locale = config('app.locale');
        }
    
        session(['locale' => $locale]);
    
        return back();
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('locale')) {
            app()->setLocale(session('locale'));
        }

        session([
            'lang' => File::get(resource_path('lang/' . app()->getLocale() . '.json')),
        ]);

        return $next($request);
    }
}

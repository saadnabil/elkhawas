<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HandleLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $langs = ['en' , 'ar' , 'de'];

        $lang = request()->header('lang') ?? session("lang")  ?? "ar";

        if(!in_array($lang, $langs)){
            $lang = 'ar';
        }

        app()->setLocale($lang);

        return $next($request);
    }
}

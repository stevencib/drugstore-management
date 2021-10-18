<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Local
{
    protected $languages = ['en', 'fr'];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('local'))
        {
            session()->put('local', $request->getPreferredLanguage($this->languages));
        }
        app()->setLocale(session('local'));

        return $next($request);
    }
}
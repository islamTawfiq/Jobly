<?php

namespace App\Http\Middleware;

use Closure;

class Authenticate
{

    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->active == 1 && auth()->user()->status == 1)
            return $next($request);
        return redirect('/login');
    }
}

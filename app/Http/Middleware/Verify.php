<?php

namespace App\Http\Middleware;

use Closure;

class Verify
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() and auth()->user()->code != Null)
            return $next($request);
        return redirect('/');
    }
}

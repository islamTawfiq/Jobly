<?php

namespace App\Http\Middleware;

use Closure;

class Agency
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() and auth()->user()->user_type_id == 3 and auth()->user()->status == 1) // agency
            return $next($request);
        return redirect('/login');
    }
}

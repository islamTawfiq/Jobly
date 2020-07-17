<?php

namespace App\Http\Middleware;

use Closure;

class Sponsor
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() and auth()->user()->user_type_id == 4 and auth()->user()->status == 1 and auth()->user()->active == 1) // Sponsor
            return $next($request);
        return redirect('/login');
    }
}

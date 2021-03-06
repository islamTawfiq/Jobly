<?php

namespace App\Http\Middleware;

use Closure;

class ImportAgency
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() and auth()->user()->user_type_id == 3 and auth()->user()->status == 1 and auth()->user()->active == 1) // importAgency
            return $next($request);
        return redirect('/login');
    }
}

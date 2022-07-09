<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMinistryMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('role') !== 2) {
            return redirect()->route('welcome');
        }

        return $next($request);
    }
}

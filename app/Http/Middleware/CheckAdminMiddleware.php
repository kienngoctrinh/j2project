<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('role') !== 1) {
            return redirect()->route('welcome');
        }

        return $next($request);
    }
}

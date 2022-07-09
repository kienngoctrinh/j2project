<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckTeacherMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('role') !== 3) {
            return redirect()->route('welcome');
        }

        return $next($request);
    }
}

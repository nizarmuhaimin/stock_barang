<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StaffMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna memiliki peran staff
        if (!auth()->check() || auth()->user()->role !== 'staff') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}

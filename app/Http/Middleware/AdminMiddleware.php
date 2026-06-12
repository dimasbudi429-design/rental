<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        if (!in_array(auth()->user()->role, ['admin','petugas'])) {
            abort(403, 'Akses ditolak');
        }

        return $next($request);
    }
}
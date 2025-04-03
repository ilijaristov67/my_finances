<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return response()->json(['message' => 'Unauthorized. Please log in.'], 401);
        }

        abort_if(! Auth::user()?->is_admin, 403, 'Access denied.');

        return $next($request);
    }
}

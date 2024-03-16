<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->role_id != 4) {
            return response()->json(['status_message' => 'Vous n\'avez pas la permission d\'accéder à cette page.'], 403);
        }

        return $next($request);
    }
}

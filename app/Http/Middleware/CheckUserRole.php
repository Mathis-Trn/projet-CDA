<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est connecté
        if ($request->user() && $request->user()->role_id === 4) {
            return $next($request);
        }

        // Rediriger ou renvoyer une réponse en cas de non-autorisation
        return redirect('/')->with('error', 'Vous n\'avez pas les autorisations nécessaires.');
    }
}

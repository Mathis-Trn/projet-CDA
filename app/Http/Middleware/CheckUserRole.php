<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié
        if ($request->user()) {
            // Récupérer le rôle de l'utilisateur
            $userRole = $request->user()->role_id;

            // Vérifier si l'utilisateur a le rôle 4 (peut créer, éditer, supprimer)
            if ($userRole == 4) {
                return $next($request);
            }

            // Si l'utilisateur n'a pas le rôle 4, vérifier s'il accède à sa propre ressource
            $userId = $request->route('user');
            if ($userId == $request->user()->id) {
                return $next($request);
            }
        }

        // Si l'utilisateur n'a pas les autorisations requises, retourner une réponse 403
        return response()->json(['status_message' => 'Vous n\'avez pas la permission d\'accéder à cette page.'], 403);
    }
}

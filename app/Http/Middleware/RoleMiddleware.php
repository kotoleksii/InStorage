<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role, $permission = null)
    {
        $user = $request->user();

        if (!$request->user()->hasRole($role))
            abort(403);

        if ($permission !== null && $user->cannot($permission))
            abort(403);

        return $next($request);
    }
}

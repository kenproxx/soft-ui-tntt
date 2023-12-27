<?php

namespace App\Http\Middleware;

use App\Enums\RoleName;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedRoles = [RoleName::ADMIN, RoleName::SUPER_ADMIN];

        if (Auth::check() && in_array(Auth::user()->role_name, $allowedRoles)) {
            return $next($request);
        }
        return abort(403, 'Unauthorized');
    }
}

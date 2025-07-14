<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdentifyTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost(); // e.g. blog1.localhost
        $tenant = \App\Models\Tenant::where('domain', $host)->first();
        if (!$tenant) {
            abort(404, "Tenant not found");
        }

        // Bind tenant globally
        app()->instance('currentTenant', $tenant);

        // Share tenant with views and other services
        view()->share('currentTenant', $tenant);

        return $next($request);
    }
}

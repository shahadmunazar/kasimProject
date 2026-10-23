<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (!Auth::check()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }
            return redirect()->route('admin.login')->with('error', 'Please login to continue.');
        }

        $user = Auth::user();

        if (!$user->is_active) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('admin.login')->with('error', 'Your account has been deactivated.');
        }

        if (!empty($roles) && !$user->hasRole($roles)) {
            // Admin has superuser access to admin & warehouse routes
            if ($user->isAdmin()) {
                return $next($request);
            }

            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized action for your role.'], 403);
            }
            abort(403, 'Unauthorized access for your account role.');
        }

        return $next($request);
    }
}

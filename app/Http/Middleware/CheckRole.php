<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // ========== 1️⃣ CEK LOGIN ==========
        if (!Auth::check()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthorized. Please log in to continue.',
                    'error' => 'UNAUTHORIZED'
                ], 401);
            }

            return redirect()->route('login')
                ->with('error', 'Silakan login untuk mengakses halaman ini.');
        }

        $user = Auth::user();
        $userRole = $user->role_id ?? 'user';

        // ========== 2️⃣ CEK ROLE ==========
        if (!empty($roles) && !in_array($userRole, $roles)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Access denied. You do not have permission to view this page.',
                    'error' => 'FORBIDDEN',
                    'required_roles' => $roles,
                    'user_role' => $userRole
                ], 403);
            }

            return response()->view('errors.403', [
                'message' => 'Anda tidak memiliki izin untuk mengakses halaman ini.',
                'required_roles' => $roles,
                'user_role' => $userRole
            ], 403);
        }

        // ========== 3️⃣ CEK AKUN NONAKTIF (opsional) ==========
        if (property_exists($user, 'is_active') && !$user->is_active) {
            Auth::logout();
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Account is deactivated. Please contact administrator.',
                    'error' => 'ACCOUNT_DEACTIVATED'
                ], 403);
            }
            return redirect()->route('login')->with('error', 'Akun Anda telah dinonaktifkan. Hubungi administrator.');
        }

        // ========== 4️⃣ LANJUTKAN ==========
        return $next($request);
    }
}

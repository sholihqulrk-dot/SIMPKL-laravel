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
        // Cek apakah user sudah login
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page.');
        }

        $user = Auth::user();

        // Cek role user
        if (!empty($roles)) {
            $userRole = $user->role_id ?? 'user'; // gunakan role_id agar konsisten dengan database

            if (!in_array($userRole, $roles)) {
                // Jika halaman tidak sesuai role dan tidak ditemukan → tampilkan 404
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'Page not found or access denied.',
                        'error' => 'NOT_FOUND',
                        'required_roles' => $roles,
                        'user_role' => $userRole
                    ], 404);
                }

                // Halaman 404 custom
                return response()->view('errors.404', [
                    'message' => 'Halaman tidak ditemukan atau Anda tidak memiliki akses.',
                    'required_roles' => $roles,
                    'user_role' => $userRole
                ], 404);
            }
        }

        // Cek jika akun nonaktif (jika punya kolom is_active)
        if (property_exists($user, 'is_active') && !$user->is_active) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Account is deactivated. Please contact administrator.',
                    'error' => 'ACCOUNT_DEACTIVATED'
                ], 403);
            }

            Auth::logout();
            return redirect()->route('login')->with('error', 'Akun Anda telah dinonaktifkan. Hubungi administrator.');
        }

        // Lanjut ke request berikutnya
        return $next($request);
    }
}

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
     */
    public function handle(Request $request, Closure $next)
    {
        // Jika pengguna belum login, arahkan ke halaman login
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        $adminRole = 'admin';

        // Jika role bukan admin, arahkan ke halaman sesuai dengan role
        if ($user->role !== $adminRole) {
            switch ($user->role) {
                case 'user':
                    return redirect('/home')->with('error', 'Unauthorized action');
                default:
                    return redirect('/')->with('error', 'Unauthorized action');
            }
        }

        return $next($request);
    }
}

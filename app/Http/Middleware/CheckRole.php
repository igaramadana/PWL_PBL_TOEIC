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
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        if (!$user->role) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['role' => 'Akun anda tidak memiliki role yang valid'])->onlyInput('email');
        }

        if ($user->role->role_kode !== $role) {
            $redirectRoute = match ($user->role->role_kode) {
                'ADM' => 'admin.index',
                'MHS' => 'mahasiswa.index',
                'TND' => 'tendik.index',
                default => null,
            };

            if ($redirectRoute) {
                return redirect()->route($redirectRoute);
            }

            Auth::logout();
            return redirect()->route('login')->withErrors(['role' => 'Anda tidak memiliki izin untuk mengakses halaman ini.'])
                ->onlyInput('email');
        }

        return $next($request);
    }
}

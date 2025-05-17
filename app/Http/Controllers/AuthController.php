<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginPage()
    {
        $title = (__('login.titleLogin'));
        return view('auth.login', compact('title'));
    }

    public function registerPage()
    {
        $title = (__('register.titleRegister'));
        return view('auth.register', compact('title'));
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        // Proses login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect berdasarkan role
            if ($user->role) {
                switch ($user->role->role_kode) {
                    case 'ADM':
                        return redirect()->route('admin.index');
                    case 'MHS':
                        return redirect()->route('mahasiswa.index');
                    case 'TND':
                        return redirect()->route('tendik.index');
                    default:
                        Auth::logout();
                        return redirect()->route('login')
                            ->withErrors(['role' => __('validation.custom.role.invalid')]);
                }
            } else {
                Auth::logout();
                return redirect()->route('login')
                    ->withErrors(['role' => __('validation.custom.role.missing')]);
            }
        }

        return redirect()->back()
            ->withErrors(['login_failed' => __('validation.custom.login_failed')])
            ->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function register(Request $request) {}
}

<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\ProdiModel;
use App\Models\KampusModel;
use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $kampuses = KampusModel::all();
        return view('auth.register', compact('title', 'kampuses'));
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

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswa,nim',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'no_telp' => 'required|string|max:20',
            'prodi_id' => 'required|exists:prodi,id',
            'angkatan' => 'required|integer|min:2000|max:2099',
            'status' => 'required|in:Aktif,Alumni',
            'terms' => 'accepted',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        // Create user
        $user = UserModel::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => RoleModel::where('role_kode', 'MHS')->first()->id
        ]);

        // Create mahasiswa
        MahasiswaModel::create([
            'user_id' => $user->id,
            'nim' => $request->nim,
            'mahasiswa_nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'prodi_id' => $request->prodi_id,
            'angkatan' => $request->angkatan,
            'status' => $request->status,
            'daftar_ujian' => false
        ]);

        Auth::login($user);

        return redirect()->route('mahasiswa.index')
            ->with('toast_success', __('Registration successful!'));
    }
}
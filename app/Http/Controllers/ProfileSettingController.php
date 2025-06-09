<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileSettingController extends Controller
{
    protected $avatar;
    public function __construct()
    {
        $this->avatar = new Avatar;
    }
    public function index()
    {
        $page = (object) [
            'title' => 'Profile Setting',
        ];

        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
        $headerProfile = $user->mahasiswa->mahasiswa_nama;

        if ($mahasiswa->foto_profile) {
            $avatar = asset('storage/' . $mahasiswa->foto_profile);
        } else {
            $avatar = $this->avatar->create($headerProfile)->setBackground('#4B5563')->toBase64();
        }

        return view('mahasiswa.profile.index', compact('page', 'user', 'mahasiswa', 'avatar'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'foto_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update data mahasiswa
        if ($user->mahasiswa) {
            $mahasiswa = $user->mahasiswa;
            $mahasiswa->mahasiswa_nama = $request->name;
            $mahasiswa->no_telp = $request->phone;
            $mahasiswa->save();
        }

        // Handle profile image upload - Updated to match PendaftaranController
        if ($request->hasFile('foto_profile')) {
            try {
                // Delete old image if exists
                if ($mahasiswa->foto_profile) {
                    Storage::delete('public/' . $mahasiswa->foto_profile);
                }

                // Store new image with proper path
                $path = $request->file('foto_profile')->store('foto_profile', 'public');
                $mahasiswa->foto_profile = $path;
                $mahasiswa->save();
            } catch (\Exception $e) {
                return back()->with('toast_error', 'Gagal mengupload foto profil: ' . $e->getMessage());
            }
        }

        return redirect()->route('mahasiswa.profile')->with('toast_success', 'Profile updated successfully!');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|min:8|confirmed',
        ]);

        try {
            $user = UserModel::findOrFail(auth()->user()->id);
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);
            return back()->with('toast_success', 'Password changed successfully!');
        } catch (\Exception $e) {
            return back()->with('toast_error', 'Failed to change password: ' . $e->getMessage());
        }
    }
}

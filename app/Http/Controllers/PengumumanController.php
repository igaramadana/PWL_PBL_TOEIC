<?php

namespace App\Http\Controllers;

use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Models\PengumumanModel;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    protected $avatar;

    public function __construct()
    {
        $this->avatar = new Avatar;
    }

    public function index()
    {
        $page = (object) [
            'title' => __('pengumuman.title'),
        ];
        $pengumuman = PengumumanModel::with('admin')->get();
        $adminNama = $pengumuman->isNotEmpty() ? $pengumuman->first()->admin->admin_nama : 'Admin';
        $avatar = $this->avatar->create($adminNama)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();
        return view('admin.pengumuman.index', compact('page', 'pengumuman', 'avatar'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        // Ensure the authenticated user has an associated admin record
        $admin = Auth::user()->admin;
        if (!$admin) {
            return redirect()->route('pengumuman.index')->with('toast_error', __('pengumuman.noAdminAccount'));
        }

        $validated['admin_id'] = $admin->id;

        try {
            PengumumanModel::create($validated);
            return redirect()->route('pengumuman.index')->with('toast_success', __('pengumuman.createSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('pengumuman.index')->with('toast_error', __('pengumuman.createError') . ': ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $pengumuman = PengumumanModel::findOrFail($id);
        $page = (object) [
            'title' => __('pengumuman.title'),
        ];

        $headerProfile = Auth::user()->admin->admin_nama;
        $avatar = $this->avatar->create($headerProfile)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();
        return view('admin.pengumuman.edit', compact('page', 'pengumuman', 'avatar'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);
        $pengumuman = PengumumanModel::findOrFail($id);
        try {
            $pengumuman->update($validated);
            return redirect()->route('pengumuman.index')->with('toast_success', __('pengumuman.updateSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('pengumuman.index')->with('toast_error', __('pengumuman.updateError') . ': ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $pengumuman = PengumumanModel::findOrFail($id);
        try {
            $pengumuman->delete();
            return redirect()->route('pengumuman.index')->with('toast_success', __('pengumuman.deleteSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('pengumuman.index')->with('toast_error', __('pengumuman.deleteError') . ': ' . $e->getMessage());
        }
    }

    public function mahasiswaIndex()
    {
        $page = (object) [
            'title' => __('pengumuman.title'),
        ];
        $pengumuman = PengumumanModel::with('admin')->latest()->get();

        if (view()->exists('mahasiswa.pengumuman.index')) {
            return view('mahasiswa.pengumuman.index', compact('page', 'pengumuman'));
        } else {
            return view('layouts.users.pengumuman', compact('page', 'pengumuman'));
        }
    }
}
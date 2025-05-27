<?php

namespace App\Http\Controllers;

use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Models\PengumumanModel;

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

        $validated['admin_id'] = auth()->user()->id;

        try {
            PengumumanModel::create($validated);
            return redirect()->route('pengumuman.index')->with('toast_success', __('pengumuman.createSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('pengumuman.index')->with('toast_error', __('pengumuman.createError'));
        }
    }

    public function edit($id)
    {
        $pengumuman = PengumumanModel::findOrFail($id);
        $page = (object) [
            'title' => __('pengumuman.title'),
        ];
        return view('admin.pengumuman.edit', compact('page', 'pengumuman'));
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
            return redirect()->route('pengumuman.index')->with('toast_error', __('pengumuman.updateError'));
        }
    }
}

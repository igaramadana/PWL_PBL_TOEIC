<?php

namespace App\Http\Controllers;

use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Models\PendaftaranModel;

class PendaftaranController extends Controller
{
    protected $avatar;

    public function __construct()
    {
        $this->avatar = new Avatar;
    }

    public function index()
    {
        $page = (object) [
            'title' => __('pendaftaran.title'),
        ];
        $pendaftaran = PendaftaranModel::with('admin')->get();
        // Use a default string for avatar if admin_nama is not available
        $avatar = $this->avatar->create('Admin')->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();
        return view('admin.pendaftaran.index', compact('page', 'pendaftaran', 'avatar'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ujian' => 'required|string|max:255',
            'jadwal_ujian' => 'required|date',
            'waktu_ujian' => 'required|date_format:H:i', // Validate time format (HH:MM)
            'kuota' => 'required|integer|min:1',
        ]);

        $validated['admin_id'] = auth()->user()->id;

        try {
            PendaftaranModel::create($validated);
            return redirect()->route('pendaftaran.index')->with('toast_success', __('pendaftaran.createSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('pendaftaran.index')->with('toast_error', __('pendaftaran.createError'));
        }
    }

    public function edit($id)
    {
        $pendaftaran = PendaftaranModel::findOrFail($id);
        $page = (object) [
            'title' => __('pendaftaran.title'),
        ];
        return view('admin.pendaftaran.edit', compact('page', 'pendaftaran'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_ujian' => 'required|string|max:255',
            'jadwal_ujian' => 'required|date',
            'waktu_ujian' => 'required|date_format:H:i', // Validate time format (HH:MM)
            'kuota' => 'required|integer|min:1',
        ]);

        $pendaftaran = PendaftaranModel::findOrFail($id);

        try {
            $pendaftaran->update($validated);
            return redirect()->route('pendaftaran.index')->with('toast_success', __('pendaftaran.updateSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('pendaftaran.index')->with('toast_error', __('pendaftaran.updateError'));
        }
    }

    public function destroy($id)
    {
        $pendaftaran = PendaftaranModel::findOrFail($id);
        try {
            $pendaftaran->delete();
            return redirect()->route('pendaftaran.index')->with('toast_success', __('pendaftaran.deleteSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('pendaftaran.index')->with('toast_error', __('pendaftaran.deleteError'));
        }
    }
}
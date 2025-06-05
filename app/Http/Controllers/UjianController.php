<?php

namespace App\Http\Controllers;

use App\Models\UjianModel;
use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Models\PendaftaranModel;
use Illuminate\Support\Facades\Auth;

class UjianController extends Controller
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
        $pendaftaran = UjianModel::with('admin')->get();
        $adminNama = $pendaftaran->isNotEmpty() ? $pendaftaran->first()->admin->admin_nama : 'Admin';
        $avatar = $this->avatar->create($adminNama)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();
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
            UjianModel::create($validated);
            return redirect()->route('ujian.index')->with('toast_success', __('pendaftaran.createSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('ujian.index')->with('toast_error', __('pendaftaran.createError'));
        }
    }

    public function edit($id)
    {
        $pendaftaran = UjianModel::findOrFail($id);
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

        $pendaftaran = UjianModel::findOrFail($id);

        try {
            $pendaftaran->update($validated);
            return redirect()->route('ujian.index')->with('toast_success', __('pendaftaran.updateSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('ujian.index')->with('toast_error', __('pendaftaran.updateError'));
        }
    }

    public function destroy($id)
    {
        $pendaftaran = UjianModel::findOrFail($id);
        try {
            $pendaftaran->delete();
            return redirect()->route('ujian.index')->with('toast_success', __('pendaftaran.deleteSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('ujian.index')->with('toast_error', __('pendaftaran.deleteError'));
        }
    }

    public function show($id)
    {
        $ujian = UjianModel::with(['admin', 'pendaftar.user'])->findOrFail($id);
        $page = (object) [
            'title' => __('Detail Ujian'),
        ];

        $headerProfile = Auth::user()->admin->admin_nama;
        $avatar = $this->avatar->create($headerProfile)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();
        return view('admin.pendaftaran.show', compact('page', 'ujian', 'avatar'));
    }

    public function detailPendaftar($id)
    {
        $page = (object) [
            'title' => __('Detail Ujian'),
        ];
        $pendaftaran = PendaftaranModel::with(['ujian', 'mahasiswa', 'hasilUjian'])
            ->findOrFail($id);
        $headerProfile = Auth::user()->admin->admin_nama;
        $avatar = $this->avatar->create($headerProfile)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();
        return view('admin.pendaftaran.detail', compact('pendaftaran', 'avatar', 'page'));
    }

    public function approve($id)
    {
        $pendaftaran = PendaftaranModel::findOrFail($id);
        $pendaftaran->update(['status' => 'Verified']);

        return redirect()->back()->with('toast_success', 'Pendaftaran berhasil disetujui');
    }
}

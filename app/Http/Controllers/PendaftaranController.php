<?php

namespace App\Http\Controllers;

use App\Models\UjianModel;
use Illuminate\Http\Request;
use App\Models\MahasiswaModel;
use App\Models\PendaftaranModel;
use App\Models\KampusModel;
use App\Models\JurusanModel;
use App\Models\ProdiModel;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function index()
    {
        $page = (object) [
            'title' => 'Pendaftaran',
        ];
        $mahasiswa = MahasiswaModel::where('user_id', auth()->user()->id)->first();
        $checkRegist = $mahasiswa && $mahasiswa->daftar_ujian;

        $pendaftaran = $checkRegist ? [] : UjianModel::with('admin')->get();

        return view('mahasiswa.pendaftaran.pendaftaran', compact('page', 'pendaftaran', 'checkRegist'));
    }

    public function showForm($id)
    {
        $page = (object) [
            'title' => 'Form Pendaftaran',
        ];

        $ujian = UjianModel::findOrFail($id);

        $mahasiswa = MahasiswaModel::with(['prodi.jurusan.kampus'])
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('mahasiswa.pendaftaran.form', compact('page', 'ujian', 'mahasiswa'));
    }

    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'nim' => 'required|string',
            'no_telp' => 'required|string',
            'kampus_id' => 'required|exists:kampus,id',
            'jurusan_id' => 'required|exists:jurusan,id',
            'prodi_id' => 'required|exists:prodi,id',
            'nik' => 'required|string|unique:pendaftaran,nik',
            'mahasiswa_nama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat_sekarang' => 'required|string',
            'alamat_asal' => 'required|string',
            'foto_ktp' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'foto_ktm' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'pas_foto' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $mahasiswa = MahasiswaModel::where('user_id', auth()->user()->id)->firstOrFail();

            if ($mahasiswa->daftar_ujian) {
                return back()->with('toast_error', 'Anda sudah pernah mendaftar ujian');
            }

            $existingRegistration = PendaftaranModel::where('ujian_id', $id)
                ->where('user_id', auth()->user()->id)
                ->exists();

            if ($existingRegistration) {
                return back()->with('toast_error', 'Anda sudah pernah mendaftar ujian ini');
            }
            $ujian = UjianModel::withCount('pendaftar')->findOrFail($id);
            if ($ujian->pendaftar_count >= $ujian->kuota) {
                return back()->with('toast_error', 'Kuota pendaftaran sudah penuh');
            }

            $fotoKtpPath = $request->file('foto_ktp')->store('ktp', 'public');
            $fotoKtmPath = $request->file('foto_ktm')->store('ktm', 'public');
            $fotoPasPath = $request->file('pas_foto')->store('pas_foto', 'public');

            $noPendaftaran = 'REG-' . date('Ymd') . '-' . strtoupper(substr(md5(uniqid()), 0, 6));

            $pendaftaran = PendaftaranModel::create([
                'ujian_id' => $id,
                'no_pendaftaran' => $noPendaftaran,
                'user_id' => auth()->user()->id,
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'nik' => $validated['nik'],
                'alamat_asal' => $validated['alamat_asal'],
                'alamat_sekarang' => $validated['alamat_sekarang'],
                'foto_ktp' => $fotoKtpPath,
                'foto_ktm' => $fotoKtmPath,
                'pas_foto' => $fotoPasPath,
                'status' => 'Non Verified',
            ]);

            $mahasiswa->update([
                'nim' => $validated['nim'],
                'no_telp' => $validated['no_telp'],
                'mahasiswa_nama' => $validated['mahasiswa_nama'],
                'prodi_id' => $validated['prodi_id'],
                'daftar_ujian' => true,
            ]);

            return redirect()->route('mahasiswa.index')
                ->with('toast_success', 'Pendaftaran berhasil. Nomor pendaftaran: ' . $noPendaftaran);
        } catch (\Exception $e) {
            return back()->with('toast_error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\UjianModel;
use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Models\MahasiswaModel;
use App\Models\PengumumanModel;
use App\Models\PendaftaranModel;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    protected $avatar;
    public function __construct()
    {
        $this->avatar = new Avatar;
    }
    public function index()
    {
        $page = (object) [
            'title' => 'Mahasiswa',
        ];

        $pengumuman = PengumumanModel::with('admin')->latest()->get();
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
        $headerProfile = $user->mahasiswa->mahasiswa_nama;

        if ($mahasiswa->foto_profile) {
            $avatar = asset('storage/' . $mahasiswa->foto_profile);
        } else {
            $avatar = $this->avatar->create($headerProfile)->setBackground('#4B5563')->toBase64();
        }

        // Ambil data mahasiswa dan pendaftaran jika ada
        $mahasiswa = MahasiswaModel::where('user_id', auth()->id())->first();
        $pendaftaran = null;
        $ujian = null;

        if ($mahasiswa && $mahasiswa->daftar_ujian) {
            $pendaftaran = PendaftaranModel::with('ujian')
                ->where('user_id', auth()->id())
                ->first();

            if ($pendaftaran) {
                $ujian = $pendaftaran->ujian;
            }
        }

        return view('mahasiswa.index', compact(
            'page',
            'pengumuman',
            'avatar',
            'mahasiswa',
            'pendaftaran',
            'ujian',
            'avatar'
        ));
    }

    public function hasilUjian()
    {
        $page = (object) [
            'title' => 'Hasil Ujian',
        ];
        // Ambil semua pendaftaran user yang sudah memiliki hasil ujian
        $pendaftarans = PendaftaranModel::with(['ujian', 'hasilUjian'])
            ->where('user_id', Auth::id())
            ->whereHas('hasilUjian')
            ->orderBy('created_at', 'desc')
            ->get();
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
        $headerProfile = $user->mahasiswa->mahasiswa_nama;

        if ($mahasiswa->foto_profile) {
            $avatar = asset('storage/' . $mahasiswa->foto_profile);
        } else {
            $avatar = $this->avatar->create($headerProfile)->setBackground('#4B5563')->toBase64();
        }

        return view('mahasiswa.hasil_ujian.index', compact('pendaftarans', 'page', 'avatar'));
    }
}

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
        $adminNama = $pengumuman->isNotEmpty() ? $pengumuman->first()->admin->admin_nama : 'Admin';
        $avatar = $this->avatar->create($adminNama)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();

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
            'ujian'
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

        return view('mahasiswa.hasil_ujian.index', compact('pendaftarans', 'page'));
    }
}

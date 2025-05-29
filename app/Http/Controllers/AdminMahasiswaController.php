<?php

namespace App\Http\Controllers;

use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Models\MahasiswaModel;

class AdminMahasiswaController extends Controller
{
    protected $avatar;
    public function __construct()
    {
        $this->avatar = new Avatar;
    }
    public function index()
    {
        $page = (object) [
            'title' => __('mahasiswa.title'),
        ];

        return view('admin.mahasiswa.index', compact('page'));
    }

    public function show($id)
    {
        $page = (object) [
            'title' => __('mahasiswa.detailTitle'),
        ];

        $mahasiswa = MahasiswaModel::with(['prodi', 'user'])->findOrFail($id);

        $avatar = null;
        if (!$mahasiswa->user->foto_profile) {
            $avatar = $this->avatar->create($mahasiswa->mahasiswa_nama)
                ->setBackground('#4B5563')
                ->setBorder(4, '#1C64F2')
                ->toBase64();
        }

        return view('admin.mahasiswa.detail', [
            'page' => $page,
            'mahasiswa' => $mahasiswa,
            'avatar' => $avatar,
            'mahasiswa_nama' => $mahasiswa->mahasiswa_nama,
            'mahasiswa_nim' => $mahasiswa->nim,
            'mahasiswa_email' => $mahasiswa->user->email,
            'mahasiswa_no_telp' => $mahasiswa->no_telp,
            'mahasiswa_prodi' => $mahasiswa->prodi->prodi_nama,
            'mahasiswa_angkatan' => $mahasiswa->angkatan,
            'mahasiswa_foto_profile' => $mahasiswa->user->foto_profile,
            'mahasiswa_status' => $mahasiswa->status,
            'mahasiswa_daftar_ujian' => $mahasiswa->daftar_ujian ? 'Sudah Daftar' : 'Belum Daftar'
        ]);
    }
}

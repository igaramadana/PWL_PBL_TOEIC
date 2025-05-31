<?php

namespace App\Http\Controllers;

use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Models\PengumumanModel;

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
        return view('mahasiswa.index', compact('page', 'pengumuman', 'avatar'));
    }
}

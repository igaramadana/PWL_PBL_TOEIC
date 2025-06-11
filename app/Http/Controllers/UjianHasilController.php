<?php

namespace App\Http\Controllers;

use App\Models\UjianModel;
use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Models\UjianHasilModel;
use App\Models\PendaftaranModel;
use App\Imports\UjianHasilImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UjianHasilController extends Controller
{
    protected $avatar;

    public function __construct()
    {
        $this->avatar = new Avatar;
    }

    public function index()
    {
        $page = (object) [
            'title' => __('ujian_hasil.title'),
        ];
        $ujian = UjianModel::withCount('pendaftar')
            ->orderBy('jadwal_ujian', 'desc')
            ->get();
        $headerProfile = Auth::user()->admin->admin_nama;
        $avatar = $this->avatar->create($headerProfile)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();
        return view('admin.ujian_hasil.index', compact('page', 'avatar', 'ujian'));
    }

    public function detail(UjianModel $ujian)
    {
        $page = (object) [
            'title' => __('ujian_hasil.title'),
        ];

        // Ambil semua pendaftar untuk ujian ini, termasuk yang belum memiliki hasil ujian
        $pendaftars = PendaftaranModel::with(['user', 'mahasiswa', 'hasilUjian'])
            ->where('ujian_id', $ujian->id)
            ->get();

        $headerProfile = Auth::user()->admin->admin_nama;
        $avatar = $this->avatar->create($headerProfile)
            ->setBackground('#4B5563')
            ->setBorder(4, '#1C64F2')
            ->toBase64();

        return view('admin.ujian_hasil.show', compact('page', 'avatar', 'ujian', 'pendaftars'));
    }

    public function import(Request $request, UjianModel $ujian)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:2048' // Tambahkan max size
        ]);

        try {
            Excel::import(new UjianHasilImport($ujian), $request->file('file'));
            return redirect()->back()->with('toast_success', 'Data hasil ujian berhasil diimpor');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errorMessages = [];

            foreach ($failures as $failure) {
                $errorMessages[] = "Baris {$failure->row()}: {$failure->errors()[0]}";
            }

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan validasi:')
                ->with('errors', $errorMessages);
        } catch (\Exception $e) {
            return redirect()->back()->with('toast_error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function formatPage()
    {
        $page = (object) [
            'title' => __('ujian_hasil.title'),
        ];
        $headerProfile = Auth::user()->admin->admin_nama;
        $avatar = $this->avatar->create($headerProfile)
            ->setBackground('#4B5563')
            ->setBorder(4, '#1C64F2')
            ->toBase64();
        return view('admin.ujian_hasil.format', compact('page', 'avatar'));
    }
}

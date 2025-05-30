<?php

namespace App\Http\Controllers;

use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use App\Models\UjianHasilModel;

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
        $ujianHasil = UjianHasilModel::with('admin')->get();
        $avatar = $this->avatar->create('Admin')->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();
        return view('admin.ujian_hasil.index', compact('page', 'ujianHasil', 'avatar'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ujian' => 'required|string|max:255',
            'jadwal_ujian' => 'required|date',
            'waktu_ujian' => 'required|date_format:H:i',
            'kuota' => 'required|integer|min:1',
            'status' => 'required|in:Belum Dilaksanakan,Sudah Dilaksanakan',
        ]);

        $validated['admin_id'] = auth()->user()->id;

        try {
            UjianHasilModel::create($validated);
            return redirect()->route('ujian_hasil.index')->with('toast_success', __('ujian_hasil.createSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('ujian_hasil.index')->with('toast_error', __('ujian_hasil.createError'));
        }
    }

    public function edit($id)
    {
        $ujianHasil = UjianHasilModel::findOrFail($id);
        $page = (object) [
            'title' => __('ujian_hasil.title'),
        ];
        return view('admin.ujian_hasil.edit', compact('page', 'ujianHasil'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_ujian' => 'required|string|max:255',
            'jadwal_ujian' => 'required|date',
            'waktu_ujian' => 'required|date_format:H:i',
            'kuota' => 'required|integer|min:1',
            'status' => 'required|in:Belum Dilaksanakan,Sudah Dilaksanakan',
        ]);

        $ujianHasil = UjianHasilModel::findOrFail($id);

        try {
            $ujianHasil->update($validated);
            return redirect()->route('ujian_hasil.index')->with('toast_success', __('ujian_hasil.updateSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('ujian_hasil.index')->with('toast_error', __('ujian_hasil.updateError'));
        }
    }

    public function destroy($id)
    {
        $ujianHasil = UjianHasilModel::findOrFail($id);
        try {
            $ujianHasil->delete();
            return redirect()->route('ujian_hasil.index')->with('toast_success', __('ujian_hasil.deleteSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('ujian_hasil.index')->with('toast_error', __('ujian_hasil.deleteError'));
        }
    }
}
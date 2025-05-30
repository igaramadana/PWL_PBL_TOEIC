<?php

namespace App\Http\Controllers;

use App\Models\UjianModel;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index()
    {
        $page = (object) [
            'title' => __('pendaftaran.title'),
        ];
        $pendaftaran = UjianModel::with('admin')->get();
        return view('admin.pendaftaran.index', compact('page', 'pendaftaran'));
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
            return redirect()->route('pendaftaran.index')->with('toast_success', __('pendaftaran.updateSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('pendaftaran.index')->with('toast_error', __('pendaftaran.updateError'));
        }
    }

    public function destroy($id)
    {
        $pendaftaran = UjianModel::findOrFail($id);
        try {
            $pendaftaran->delete();
            return redirect()->route('pendaftaran.index')->with('toast_success', __('pendaftaran.deleteSuccess'));
        } catch (\Exception $e) {
            return redirect()->route('pendaftaran.index')->with('toast_error', __('pendaftaran.deleteError'));
        }
    }
}

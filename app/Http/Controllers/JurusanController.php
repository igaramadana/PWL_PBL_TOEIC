<?php

namespace App\Http\Controllers;

use App\Models\KampusModel;
use App\Models\JurusanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = (object) [
            'title' => __('jurusan.title'),
        ];
        $kampus = KampusModel::all();
        return view('admin.jurusan.index', compact('page', 'kampus'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jurusan_kode' => 'required|min:3|unique:jurusan,jurusan_kode',
            'jurusan_nama' => 'required',
            'kampus_id' => 'required|exists:kampus,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            JurusanModel::create([
                'jurusan_kode' => $request->jurusan_kode,
                'jurusan_nama' => $request->jurusan_nama,
                'kampus_id' => $request->kampus_id
            ]);

            return redirect()->route('jurusan.index')
                ->with('toast_success', __('jurusan.createSuccess'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('toast_error', __('jurusan.createError'))
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($jurusan_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'jurusan_kode' => 'required|min:3|unique:jurusan,jurusan_kode,' . $id,
            'jurusan_nama' => 'required',
            'kampus_id' => 'required|exists:kampus,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('toast_error', __('jurusan.updateError'));
        }

        try {
            $jurusan = JurusanModel::findOrFail($id);
            $jurusan->update([
                'jurusan_kode' => $request->jurusan_kode,
                'jurusan_nama' => $request->jurusan_nama,
                'kampus_id' => $request->kampus_id
            ]);
            return redirect()->route('jurusan.index')
                ->with('toast_success', __('jurusan.updateSuccess'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('toast_error', __('jurusan.updateError') . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check = JurusanModel::find($id);

        if (!$check) {
            return redirect()->back()
                ->with('toast_error', __('jurusan.deleteError'));
        }
        try {
            JurusanModel::destroy($id);
            return redirect()->route('jurusan.index')
                ->with('toast_success', __('jurusan.deleteSuccess'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('toast_error', __('jurusan.deleteError'));
        }
    }
}

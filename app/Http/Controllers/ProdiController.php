<?php

namespace App\Http\Controllers;

use App\Models\ProdiModel;
use App\Models\JurusanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = (object) [
            'title' => __('prodi.title'),
        ];
        $jurusan = JurusanModel::all();
        return view('admin.prodi.index', compact('page', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'prodi_kode' => 'required|min:3|unique:prodi,prodi_kode',
            'prodi_nama' => 'required',
            'jurusan_id' => 'required|exists:jurusan,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            ProdiModel::create([
                'prodi_kode' => $request->prodi_kode,
                'prodi_nama' => $request->prodi_nama,
                'jurusan_id' => $request->jurusan_id
            ]);
            return redirect()->route('prodi.index')
                ->with('toast_success', __('prodi.createSuccess'));
        } catch (\Exception $e) {
            return redirect()->back()->with('toast_error', __('prodi.createError'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'prodi_kode' => 'required|min:3|unique:prodi,prodi_kode,' . $id,
            'prodi_nama' => 'required',
            'jurusan_id' => 'required|exists:jurusan,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('toast_error', __('prodi.updateError'));
        }

        try {
            $prodi = ProdiModel::findOrFail($id);
            $prodi->update([
                'prodi_kode' => $request->prodi_kode,
                'prodi_nama' => $request->prodi_nama,
                'jurusan_id' => $request->jurusan_id
            ]);
            return redirect()->route('prodi.index')
                ->with('toast_success', __('prodi.updateSuccess'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('toast_error', __('prodi.updateError') . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check = ProdiModel::find($id);
        if (!$check) {
            return redirect()->back()->with('toast_error', __('prodi.deletenotFound'));
        }

        try {
            $check->delete();
            return redirect()->route('prodi.index')->with('toast_success', __('prodi.deleteSuccess'));
        } catch (\Exception $e) {
            return redirect()->back()->with('toast_error', __('prodi.deleteError'));
        }
    }
}

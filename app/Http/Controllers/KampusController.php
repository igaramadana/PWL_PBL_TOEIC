<?php

namespace App\Http\Controllers;

use App\Models\KampusModel;
use Illuminate\Http\Request;

class KampusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = (object) [
            'title' => __('kampus.title'),
        ];
        return view('admin.kampus.index', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kampus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kampus_nama' => 'required|string|max:255',
            'kampus_alamat' => 'required|string',
        ]);

        try {
            KampusModel::create([
                'kampus_nama' => $request->kampus_nama,
                'kampus_alamat' => $request->kampus_alamat,
            ]);

            return redirect()->route('kampus.index')
                ->with('toast_success', 'Data kampus berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('toast_error', 'Gagal menambahkan data kampus: ' . $e->getMessage());
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

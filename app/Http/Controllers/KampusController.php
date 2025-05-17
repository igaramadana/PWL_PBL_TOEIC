<?php

namespace App\Http\Controllers;

use App\Models\KampusModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
        try {
            $request->validate([
                'kampus_nama' => 'required|string|max:255|unique:kampus,kampus_nama',
                'kampus_alamat' => 'required|string',
            ]);

            KampusModel::create([
                'kampus_nama' => $request->kampus_nama,
                'kampus_alamat' => $request->kampus_alamat,
            ]);

            return redirect()->route('kampus.index')
                ->with('toast_success', __('kampus.successToast'));
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->getMessages();

            if (
                isset($errors['kampus_nama']) &&
                str_contains(implode('', $errors['kampus_nama']), 'already been taken')
            ) {
                return redirect()->back()
                    ->with('toast_error', __('kampus.duplicateError', ['name' => $request->kampus_nama]));
            }

            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('toast_error', __('kampus.errorToast'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('toast_error', __('kampus.errorToast') . $e->getMessage());
        }
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
            'kampus_nama' => 'required|string|max:255|unique:kampus,kampus_nama,' . $id,
            'kampus_alamat' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('toast_error', __('kampus.errorToast'));
        }
        try {
            $kampus = KampusModel::findOrFail($id);

            $kampus->update([
                'kampus_nama' => $request->kampus_nama,
                'kampus_alamat' => $request->kampus_alamat,
            ]);
            return redirect()->route('kampus.index')
                ->with('toast_success', __('kampus.updateSuccessToast'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('toast_error', __('kampus.updateErrorToast') . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check = KampusModel::find($id);
        if (!$check) {
            return redirect()->route('kampus.index')->with('toast_error', 'Data tidak ditemukan');
        }

        try {
            KampusModel::destroy($id);
            return redirect()->route('kampus.index')->with('toast_success', __('kampus.deleteSuccessToast'));
        } catch (\Exception $e) {
            return redirect()->route('kampus.index')->with('toast_error', __('kampus.deleteErrorToast') . $e->getMessage());
        }
    }
}

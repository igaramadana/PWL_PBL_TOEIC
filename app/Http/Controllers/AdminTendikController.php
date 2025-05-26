<?php

namespace App\Http\Controllers;

use App\Models\KampusModel;
use App\Models\TendikModel;
use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;

class AdminTendikController extends Controller
{
    protected $avatar;
    public function __construct()
    {
        $this->avatar = new Avatar;
    }
    public function index()
    {
        $page = (object) [
            'title' => __('tendik.title'),
        ];
        $kampus = KampusModel::all();
        return view('admin.tendik.index', compact('page', 'kampus'));
    }

    public function show($id)
    {
        $page = (object) [
            'title' => __('tendik.title'),
        ];
        $tendik = TendikModel::with(['user', 'kampus'])->findOrFail($id);
        $avatar = $this->avatar->create($tendik->tendik_nama)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();
        return view('admin.tendik.detail', compact('tendik', 'page', 'avatar'));
    }
}

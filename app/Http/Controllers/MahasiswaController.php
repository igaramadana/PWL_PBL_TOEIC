<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $page = (object) [
            'title' => 'Mahasiswa',
        ];
        return view('mahasiswa.index', compact('page'));
    }
}

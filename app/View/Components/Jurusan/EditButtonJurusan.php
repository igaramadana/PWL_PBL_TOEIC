<?php

namespace App\View\Components\Jurusan;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\KampusModel;

class EditButtonJurusan extends Component
{
    public $kampus; // Deklarasikan properti publik

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Ambil semua data kampus dan simpan ke properti $kampus
        $this->kampus = KampusModel::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-button-jurusan');
    }
}

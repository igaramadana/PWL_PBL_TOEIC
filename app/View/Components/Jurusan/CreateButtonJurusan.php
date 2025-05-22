<?php

namespace App\View\Components\Jurusan;

use Closure;
use App\Models\KampusModel;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CreateButtonJurusan extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.create-button-jurusan');
    }
}

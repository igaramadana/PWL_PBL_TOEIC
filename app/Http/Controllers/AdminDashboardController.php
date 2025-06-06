<?php

namespace App\Http\Controllers;

use Laravolt\Avatar\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    protected $avatar;
    public function __construct()
    {
        $this->avatar = new Avatar;
    }
    public function index()
    {
        $page = (object) [
            'title' => __('admin_dashboard.title'),
        ];
        $headerProfile = Auth::user()->admin->admin_nama;
        $avatar = $this->avatar->create($headerProfile)->setBackground('#4B5563')->setBorder(4, '#1C64F2')->toBase64();

        return view('admin.index', compact('page', 'avatar'));
    }
}

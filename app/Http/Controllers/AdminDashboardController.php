<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $page = (object) [
            'title' => __('admin_dashboard.title'),
        ];

        return view('admin.index', compact('page'));
    }
}

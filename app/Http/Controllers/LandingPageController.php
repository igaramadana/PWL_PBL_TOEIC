<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $title = (__('landing.pageTitle'));
        return view('welcome', compact('title'));
    }
}

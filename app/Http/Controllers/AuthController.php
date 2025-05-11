<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage()
    {
        $title = (__('login.titleLogin'));
        return view('auth.login', compact('title'));
    }

    public function registerPage()
    {
        $title = (__('register.titleRegister'));
        return view('auth.register', compact('title'));
    }
}

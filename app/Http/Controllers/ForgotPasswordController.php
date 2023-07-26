<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('forgot_password.index', [
            'title' => 'Forgot Password'
        ]);
    }

    public function verification()
    {
        return view('forgot_password.verification', [
            'title' => 'Forgot Password'
        ]);
    }

    public function change()
    {
        return view('forgot_password.change', [
            'title' => 'Forgot Password'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function sendCode(Request $request)
    {
        $validate = $request->validate([
            'email' => ['required', 'email:dns'],
        ]);

        if ($validate) {

            dd($request);
        }

        return back()->withErrors('email');
    }
}

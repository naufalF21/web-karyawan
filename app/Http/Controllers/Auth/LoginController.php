<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login.index', [
            'title' => 'Login'
        ]);
    }

    public function attemptLogin(Request $request)
    {
        $user = new User();
        return Auth::attempt(
            $this->credentials($request),
            $request->filled('remember')
        ) && $user->approved();
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'Login Failed: Please check your email or password and try again.')->withErrors('email');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}

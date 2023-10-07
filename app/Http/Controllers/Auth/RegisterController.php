<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255|confirmed'
        ]);

        if ($validatedData->fails()) {
            return redirect()->route('register')
                ->withErrors($validatedData)
                ->withInput();
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), // Enkripsi password menggunakan bcrypt
        ]);

        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }

    public function verification()
    {
        return view('auth.register.verification', [
            'title' => 'Register'
        ]);
    }
}

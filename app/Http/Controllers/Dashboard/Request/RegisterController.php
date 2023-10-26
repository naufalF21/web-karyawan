<?php

namespace App\Http\Controllers\Dashboard\Request;

use App\Models\User;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('dashboard.request.index', [
            'title' => 'Dashboard Request',
            'users' => $users,

        ]);
    }

    public function approveUser(User $user)
    {
        $user->is_approved = 'true';
        $user->save();

        return redirect()->route('request')->with('status', 'User has been approved successfully.');
    }

    public function rejectedUser(User $user)
    {
        $user->is_approved = 'false';
        $user->save();

        return redirect()->route('request')->with('status', 'User has been rejected successfully.');
    }
}

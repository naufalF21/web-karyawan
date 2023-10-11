<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.request.index', [
            'title' => 'Dashboard Request',
            'users' => $users
        ]);
    }

    public function getCuti()
    {
        $users = User::all();
        return view('dashboard.request.cuti', [
            'title' => 'Dashboard Request',
            'users' => $users
        ]);
    }

    public function getLembur()
    {
        $users = User::all();
        return view('dashboard.request.lembur', [
            'title' => 'Dashboard Request',
            'users' => $users
        ]);
    }

    public function approveUser($id)
    {
        $user = User::find($id);
        $user->is_approved = true;
        $user->save();
        // Redirect atau memberikan respons sukses
    }
}

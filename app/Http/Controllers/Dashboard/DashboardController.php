<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'users' => $users,
        ]);
    }
}

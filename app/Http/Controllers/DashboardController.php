<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Absen;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
        ]);
    }

    public function absen()
    {
        return view('dashboard.absen', [
            'title' => 'Dashboard',
        ]);
    }

    public function employees()
    {
        return view('dashboard.employees', [
            'title' => 'Dashboard',
        ]);
    }

    public function request()
    {
        return view('dashboard.request', [
            'title' => 'Dashboard',
        ]);
    }

    public function report()
    {
        $users = User::all();
        $absen = new Absen;

        return view('dashboard.report', [
            'title' => 'Dashboard',
            'users' => $users,
            'absen' => $absen,
        ]);
    }
}

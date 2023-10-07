<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Absen;
use App\Models\Lembur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
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
        $absen = new Absen();
        $lembur = new Lembur();

        return view('dashboard.report', [
            'title' => 'Dashboard',
            'users' => $users,
            'absen' => $absen,
            'lembur' => $lembur
        ]);
    }
}

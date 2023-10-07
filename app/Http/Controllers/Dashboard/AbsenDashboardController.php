<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Absen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbsenDashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $absen = new Absen();
        $today = now();
        $absens = Absen::whereDate('tanggal', $today->toDateString())->get();

        return view('dashboard.absen.index', [
            'title' => 'Dashboard Absen',
            'users' => $users,
            'absens' => $absens,
            'absen' => $absen,
            'today' => $today->format('M d,Y'),
            'totalAbsenToday' => $absens->count()
        ]);
    }
}

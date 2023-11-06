<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Cuti;
use App\Models\User;
use App\Models\Absen;
use App\Models\Lembur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $users = User::all();
        $absen = new Absen();
        $lembur = new Lembur();
        $cuti = new Cuti();
        $date = now();
        $bulan = $date->format('n');
        $tahun = $date->format('o');

        return view('dashboard.report.index', [
            'title' => 'Dashboard',
            'users' => $users,
            'absen' => $absen,
            'lembur' => $lembur,
            'cuti' => $cuti,
            'date' => $date->format('F, o'),
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);
    }

    public function filter(Request $request)
    {
        $date = Carbon::createFromFormat('Y-m', $request->date);
        $bulan = $date->format('n');
        $tahun = $date->format('o');
        $absen = new Absen();
        $lembur = new Lembur();
        $cuti = new Cuti();
        $users = User::all();
        $formattedDate = Carbon::parse($date)->format('Y-m');

        if ($formattedDate == now()->format('Y-m')) {
            return redirect()->route('report');
        }

        return view('dashboard.report.index', [
            'title' => 'Dashboard',
            'users' => $users,
            'absen' => $absen,
            'lembur' => $lembur,
            'cuti' => $cuti,
            'date' => $date->format('F, o'),
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);
    }
}

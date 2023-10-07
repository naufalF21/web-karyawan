<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Absen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lembur;

class AbsenDashboardController extends Controller
{
    public function index()
    {
        $lembur = new Lembur();
        $today = now();
        $absens = Absen::whereDate('tanggal', $today->toDateString())->get();

        return view('dashboard.absen.index', [
            'title' => 'Dashboard Absen',
            'absens' => $absens,
            'lembur' => $lembur,
            'todayFormatted' => $today->format('M d,Y'),
            'totalAbsenToday' => $absens->count()
        ]);
    }

    public function getFilter(Request $request)
    {
        $date = $request->input('date');
        $lembur = new Lembur();
        $absens = Absen::whereDate('tanggal', $date);
        $formattedDate = Carbon::parse($date);

        return view('dashboard.absen.index', [
            'title' => 'Dashboard Absen',
            'absens' => $absens->get(),
            'lembur' => $lembur,
            'todayFormatted' => $formattedDate->format('M d, Y'),
            'totalAbsenToday' => $absens->count()
        ]);
    }
}

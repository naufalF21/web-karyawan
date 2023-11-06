<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Absen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lembur;

class PresenceController extends Controller
{
    public function index()
    {
        $lembur = new Lembur();
        $today = now();
        $users = User::all();
        $absen = new Absen();

        return view('dashboard.presence.index', [
            'title' => 'Dashboard Presence',
            'users' => $users,
            'lembur' => $lembur,
            'absen' => $absen,
            'todayFormatted' => $today->format('M d,Y'),
        ]);
    }

    public function attended()
    {
        $lembur = new Lembur();
        $today = now();
        $absens = Absen::whereDate('tanggal', $today->toDateString())->where('status', 'Attended')->get();

        return view('dashboard.presence.attended', [
            'title' => 'Dashboard Presence',
            'absens' => $absens,
            'lembur' => $lembur,
            'todayFormatted' => $today->format('M d,Y'),
        ]);
    }

    public function absent($userId)
    {
        $date = now();
        Absen::create([
            'user_id' => $userId,
            'tanggal' => $date->toDateString(),
            'status' => 'Absent',
        ]);
        return redirect()->route('presence');
    }

    public function getFilter(Request $request, $page)
    {
        $date = $request->input('date');
        $lembur = new Lembur();
        $absens = Absen::whereDate('tanggal', $date);
        $absen = new Absen();
        $formattedDate = Carbon::parse($date)->format('M d,Y');

        if ($page == 'index') {
            if ($formattedDate == now()->format('M d,Y')) {
                return redirect()->route('presence');
            }
            return view('dashboard.presence.index', [
                'title' => 'Dashboard Presence',
                'absens' => $absens->get(),
                'lembur' => $lembur,
                'absen' => $absen,
                'todayFormatted' => $formattedDate,
            ]);
        }

        if ($formattedDate == now()->format('M d,Y')) {
            return redirect()->route('presence.attended');
        }

        return view('dashboard.presence.attended', [
            'title' => 'Dashboard Presence',
            'absens' => $absens->where('status', 'attended')->get(),
            'lembur' => $lembur,
            'todayFormatted' => $formattedDate,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function index()
    {
        $absen = new Absen();

        if ($absen->existingAbsen()) {
            $absen = $absen->latest()->first();
            if ($absen->jam_kerja) {
                return redirect()->route('absen.done');
            }
        } else {
            $absen = null;
        }

        return view('absen.index', [
            'title' => 'Absen',
            'data' => $absen,
        ]);
    }

    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $action = $request->input('action');
        $tanggal = now();

        $absensi = Absen::where('user_id', $userId)
            ->whereDate('tanggal', $tanggal->toDateString())
            ->first();

        if (!$absensi) {
            $absensi = Absen::create([
                'user_id' => $userId,
                'tanggal' => $tanggal->toDateString(),
            ]);
        }

        if ($action === 'check_in') {
            $waktuCheckIn = $tanggal->format('Y-m-d h:i:s A');

            // Periksa apakah waktu check-in terlambat
            $batasTelat = Carbon::parse($tanggal)->setHour(8)->setMinute(40); // Contoh: Batas waktu telat jam 08:15 pagi
            if ($tanggal > $batasTelat) {
                $absensi->update(['waktu_check_in' => $waktuCheckIn, 'terlambat' => true]);
                return redirect()->route('absen')->with('error', 'Check In berhasil dilakukan.');
            } else {
                $absensi->update(['waktu_check_in' => $waktuCheckIn, 'terlambat' => false]);
                return redirect()->route('absen')->with('success', 'Check In berhasil dilakukan.');
            }
        } elseif ($action === 'check_out') {
            $start = Carbon::parse($absensi->waktu_check_in);
            $end = Carbon::parse($absensi->waktu_check_out);

            $workHours = $this->formatWorkHours($this->calculateWorkHours($start, $end));
            $absensi->update(['waktu_check_out' => $tanggal->format('Y-m-d h:i:s A'), 'jam_kerja' => $workHours]);
            return redirect()->route('absen.done');
        }

        return redirect()->route('absen')->with('error', 'Tindakan tidak valid.');
    }

    public function done()
    {
        $today = now();
        $userId = auth()->user()->id;
        $absensi = Absen::where('user_id', $userId)
            ->whereDate('tanggal', $today->toDateString())
            ->first();

        if ($absensi == null || $absensi->jam_kerja == null) {
            return redirect()->route('absen');
        }

        return view('absen.done', [
            'title' => 'Absen',
        ]);
    }

    function calculateWorkHours(Carbon $start, Carbon $end)
    {
        // Hitung selisih waktu dalam detik
        $diffInSeconds = $end->diffInSeconds($start);

        // Hitung jam kerja dalam jam
        $workHours = $diffInSeconds / 3600;

        return $workHours;
    }

    function formatWorkHours($workHours)
    {

        $hours = floor($workHours);
        $minutes = floor(($workHours - $hours) * 60);
        $seconds = round((($workHours - $hours) * 60 - $minutes) * 60);

        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }
}

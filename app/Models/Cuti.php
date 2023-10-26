<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuti extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hitungRemainingDaysOff()
    {
        $user = auth()->user();
        $currentYear = Carbon::now()->year;
        $cutis = Cuti::where('user_id', $user->id)->whereYear('created_at', $currentYear)->get();
        $totalMenit = 1440;
        $totalSelisihHari = 0;

        // hitung perjam cuti
        foreach ($cutis as $cuti) {
            if ($cuti->jenis == 'Harian') {
                // Jam mulai cuti
                $mulaiJamCuti = Carbon::parse($cuti->mulai_jam_cuti);
                // Jam selesai cuti
                $selesaiJamCuti = Carbon::parse($cuti->sd_jam_cuti);

                $selisihMenit = $mulaiJamCuti->diffInMinutes($selesaiJamCuti);
                $totalMenit -= $selisihMenit;
            } else {
                // Hari mulai cuti
                $mulaiHari = Carbon::parse($cuti->tanggal);
                // Hari selesai cuti
                $selesaiHari = Carbon::parse($cuti->sd_tanggal);

                $selisihHari = $mulaiHari->diffInDays($selesaiHari);
                $totalSelisihHari += $selisihHari;
            }
        }

        // Menghitung jumlah jam yang merupakan kelipatan 24

        $jam = floor($totalMenit / 60);
        $menit = $totalMenit % 60; // Sisa menit
        $totalJam = floor($jam / 24);
        $jamSisa = $jam - ($totalJam * 24);

        if ($jamSisa == 0) {
            $jamSisa = 24;
            $totalSelisihHari += 1;
        }

        $hariSisa = 11 - $totalSelisihHari;
        $hari = $totalJam % 24;

        $hariSisa += $hari;
        if ($hariSisa < 0) {
            $jamSisa = 0;
            $hariSisa = 0;
        }
        $remainingDaysOff = $hariSisa . ' Day, ' . sprintf('%dh %02dm', $jamSisa, abs($menit));

        return $remainingDaysOff;
    }

    public function filterDate(Request $request)
    {
        $date = $request->input('date');
        $cutis = Cuti::whereDate('tanggal', $date)->get();
        return $cutis;
    }
}

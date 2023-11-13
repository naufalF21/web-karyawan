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

    private function hitungCuti($cutis)
    {
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
        $totalJam = floor($jam / 8);
        $jamSisa = $jam - ($totalJam * 8);

        if ($jamSisa == 0) {
            $jamSisa = 8;
            $totalSelisihHari += 1;
        }

        $hariSisa = 9 - $totalSelisihHari;
        $hari = $totalJam % 8;
        $hariSisa += $hari;

        if ($hariSisa < 0) {
            $jamSisa = 0;
            $hariSisa = 0;
        }
        $remainingDaysOff = $hariSisa . ' Day, ' . sprintf('%dh %02dm', $jamSisa, abs($menit));

        return $remainingDaysOff;
    }

    public function totalCuti($userId, $bulan, $tahun)
    {
        $cutis = Cuti::where('user_id', $userId)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->get();

        return $this->hitungCuti($cutis);
    }

    public function hitungRemainingDaysOff()
    {
        $user = auth()->user();
        $currentYear = Carbon::now()->year;
        $cutis = Cuti::where('user_id', $user->id)
            ->where('status', 'true')
            ->whereYear('created_at', $currentYear)->get();

        return $this->hitungCuti($cutis);
    }
}

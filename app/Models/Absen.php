<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getStatus($userId)
    {
        $today = now();
        $absen = Absen::whereDate('tanggal', $today)->where('user_id', $userId);

        if ($absen->count() > 0) {
            return $absen->first()->status;
        }

        return 0;
    }

    public function totalAbsent($userId, $bulan, $tahun)
    {
        $absen = Absen::where('user_id', $userId)
            ->where('status', 'Absent')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun);

        return $absen->count();
    }

    public function totalPresent($userId, $bulan, $tahun)
    {
        $absen = Absen::where('user_id', $userId)
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->where('status', 'Attended')->get();

        return $absen;
    }

    public function totalTerlambat($userId, $bulan, $tahun)
    {
        $absens = Absen::where('user_id', $userId)
            ->where('terlambat', true)
            ->get();
        $totalTelatDetik = 0;
        $batasWaktu = Carbon::createFromTime(8, 40, 0); // Jam, Menit, Detik

        if ($absens->count() > 0) {
            foreach ($absens as $absen) {
                $waktuCheckIn = Carbon::createFromTimeString($absen->waktu_check_in);

                if ($waktuCheckIn->greaterThan($batasWaktu)) {
                    $telatDetik = $waktuCheckIn->diffInSeconds($batasWaktu);

                    $totalTelatDetik += $telatDetik;
                }
            }
            $formatJamMenitDetik = gmdate("H:i:s", $totalTelatDetik);

            return $formatJamMenitDetik;
        }

        return '00:00:00';
    }

    public function existingAbsen()
    {
        $user = auth()->user();
        $tanggal = Carbon::now()->format('Y-m-d');

        return Absen::where('user_id', $user->id)
            ->where('tanggal', $tanggal)
            ->first();
    }

    public function handleInAndOut($userId, $type)
    {
        $absen = Absen::where('user_id', $userId)->latest()->first();
        $value = '';
        if ($type == 'check_in') {
            $value = $absen->waktu_check_in;
        } elseif ($type == 'check_out') {
            $value = $absen->waktu_check_out;
        }

        if ($value == '') {
            return '-';
        } else {
            $carbonDate = Carbon::parse($value);

            $time = $carbonDate->format('h:i:s A');

            return $time;
        }
    }
}

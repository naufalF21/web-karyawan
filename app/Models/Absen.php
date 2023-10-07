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

    public function existingAbsen()
    {
        $user = auth()->user();
        $tanggal = Carbon::now()->format('Y-m-d');

        return Absen::where('user_id', $user->id)
            ->where('tanggal', $tanggal)
            ->first();
    }

    public function hitungJamTerlambat()
    {
        $attendances = Absen::where('user_id', auth()->id())->get();
        // Inisialisasi total waktu telat
        $totalLateTime = 0;

        // Loop melalui setiap catatan kehadiran
        foreach ($attendances as $attendance) {
            // Parse waktu check-in dan waktu yang diharapkan (pukul 08.40)
            $checkIn = Carbon::parse($attendance->waktu_check_in);
            $expectedCheckIn = Carbon::parse($attendance->waktu_check_in)->setHour(8)->setMinute(40)->setSecond(0);

            // Check jika check-in dilakukan setelah pukul 16.10
            if ($checkIn > $expectedCheckIn && $checkIn->format('H:i') > '16:10') {
                $lateTimeInSeconds = $checkIn->diffInSeconds($expectedCheckIn);
                $totalLateTime += $lateTimeInSeconds;
            }
        }

        // Konversi total waktu telat ke format jam:menit:detik
        $totalLateTimeFormatted = gmdate("H:i:s", $totalLateTime);

        return $totalLateTimeFormatted;
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

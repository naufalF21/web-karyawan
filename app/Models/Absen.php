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

    public function hitungJamTerlambat($user_id)
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
}

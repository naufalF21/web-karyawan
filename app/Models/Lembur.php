<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lembur extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function filterDate(Request $request)
    {
        $date = $request->input('date');
        $lemburs = Lembur::whereDate('tanggal_lembur', $date)->get();
        return $lemburs;
    }

    public function hitungTotalLemburPerBulan()
    {
        $user = auth()->user();
        $currentMonth = Carbon::now()->month;
        $lemburs = Lembur::where('user_id', $user->id)
            ->whereMonth('created_at', $currentMonth)
            ->get();
        $totalOvertimeMinutes = 0;

        foreach ($lemburs as $lembur) {
            $mulaiLembur = Carbon::createFromFormat('H:i', $lembur->mulai_lembur);
            $selesaiLembur = Carbon::createFromFormat('H:i', $lembur->sd_lembur);

            // Jika waktu selesai lembur lebih kecil dari waktu mulai lembur, tambahkan 1 hari pada waktu selesai lembur
            if ($selesaiLembur < $mulaiLembur) {
                $selesaiLembur->addDay();
            }

            // Hitung selisih waktu antara mulai lembur dan selesai lembur dalam menit
            $overtimeMinutes = $mulaiLembur->diffInMinutes($selesaiLembur);
            $totalOvertimeMinutes += $overtimeMinutes;
        }

        $hours = floor($totalOvertimeMinutes / 60); // Hitung jam
        $minutes = $totalOvertimeMinutes % 60; // Sisa menit

        $formattedOvertime = sprintf('%dh %02dm', $hours, $minutes);

        return $formattedOvertime;
    }

    public function hitungTotalLembur($user_id)
    {
        $lemburs = Lembur::where('user_id', $user_id)
            ->get();
        $totalOvertimeMinutes = 0;

        foreach ($lemburs as $lembur) {
            $mulaiLembur = Carbon::createFromFormat('H:i', $lembur->mulai_lembur);
            $selesaiLembur = Carbon::createFromFormat('H:i', $lembur->sd_lembur);

            // Jika waktu selesai lembur lebih kecil dari waktu mulai lembur, tambahkan 1 hari pada waktu selesai lembur
            if ($selesaiLembur < $mulaiLembur) {
                $selesaiLembur->addDay();
            }

            // Hitung selisih waktu antara mulai lembur dan selesai lembur dalam menit
            $overtimeMinutes = $mulaiLembur->diffInMinutes($selesaiLembur);
            $totalOvertimeMinutes += $overtimeMinutes;
        }

        $hours = floor($totalOvertimeMinutes / 60); // Hitung jam
        $minutes = $totalOvertimeMinutes % 60; // Sisa menit

        $formattedOvertime = sprintf('%dh %02dm', $hours, $minutes);

        return $formattedOvertime;
    }

    public function hitungLemburPerHariIni($userId)
    {
        $today = now()->format('Y-m-d');
        $data = Lembur::where('user_id', $userId)
            ->where('tanggal_lembur', $today)
            ->first();

        $totalOvertimeMinutes = 0;

        if ($data) {
            $mulaiLembur = Carbon::createFromFormat('H:i', $data->mulai_lembur);
            $selesaiLembur = Carbon::createFromFormat('H:i', $data->sd_lembur);

            // Jika waktu selesai lembur lebih kecil dari waktu mulai lembur, tambahkan 1 hari pada waktu selesai lembur
            if ($selesaiLembur < $mulaiLembur) {
                $selesaiLembur->addDay();
            }

            // Hitung selisih waktu antara mulai lembur dan selesai lembur dalam menit
            $overtimeMinutes = $mulaiLembur->diffInMinutes($selesaiLembur);
            $totalOvertimeMinutes += $overtimeMinutes;

            $hours = floor($totalOvertimeMinutes / 60); // Hitung jam
            $minutes = $totalOvertimeMinutes % 60; // Sisa menit

            $formattedOvertime = sprintf('%dh %02dm', $hours, $minutes);

            return $formattedOvertime;
        } else {
            return null;
        }
    }
}

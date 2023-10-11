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

    public function hitungJamTerlambat($userId)
    {
        $absens = Absen::where('user_id', $userId)
            ->where('terlambat', true)
            ->get();

        return $absens->count();
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

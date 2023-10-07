<?php

namespace App\Models;

use Carbon\Carbon;
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
        // $cutis = $user->cutis->count();
        $cutis = Cuti::where('user_id', $user->id)
            ->whereYear('created_at', $currentYear)
            ->count();
        $remainingDaysOff = 12 - $cutis;

        return $remainingDaysOff;
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function cutis()
    {
        return $this->hasMany(Cuti::class);
    }

    public function absens()
    {
        return $this->hasMany(Absen::class);
    }

    public function checkout()
    {
        $userId = auth()->user()->id;
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

        // Pastikan pengguna sudah masuk sebelum melakukan absen keluar.
        if ($absensi->waktu_check_in && !$absensi->waktu_check_out) {
            // dd($absensi->waktu_check_out);
            $absensi->update(['waktu_check_out' => $tanggal->format('Y-m-d h:i:s A')]);
        }
    }
}

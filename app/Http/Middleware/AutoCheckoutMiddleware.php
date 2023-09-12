<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutoCheckoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $now = Carbon::now();
        $checkoutTime = Carbon::now()->setTime(16, 10, 0); // 4:10 PM
        $user = new User();

        if ($now->greaterThanOrEqualTo($checkoutTime) && Auth::check()) {
            // Lakukan absen otomatis (keluar) jika pengguna sudah masuk dan waktu sudah 4:10 PM.
            $user->checkout();
        }

        return $next($request);
    }
}

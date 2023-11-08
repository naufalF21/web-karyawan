<?php

namespace App\Http\Controllers;

use App\Models\User;

class NotifikasiController extends Controller
{
    public function markAsRead($userId)
    {
        $user = User::find($userId);

        $user->unreadNotifications->markAsRead();

        return back();
    }

    public function clearAll($userId)
    {
        $user = User::find($userId);

        $user->notifications()->delete();

        return back();
    }
}

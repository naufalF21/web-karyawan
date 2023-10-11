<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Absen;
use App\Models\Lembur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
        ]);
    }
}

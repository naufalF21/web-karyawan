<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Absen;
use App\Models\Lembur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $users = User::all();
        $absen = new Absen();
        $lembur = new Lembur();

        return view('dashboard.report.index', [
            'title' => 'Dashboard',
            'users' => $users,
            'absen' => $absen,
            'lembur' => $lembur
        ]);
    }
}

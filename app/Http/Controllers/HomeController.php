<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Lembur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $lembur = new Lembur();
        $cuti = new Cuti();
        return view('home.index', [
            'title' => 'Home',
            'remainingDaysOff' => $cuti->hitungRemainingDaysOff(),
            'overtimeMonthly' => $lembur->hitungTotalLemburPerBulan()
        ]);
    }
}

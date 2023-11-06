<?php

namespace App\Http\Controllers\Dashboard\Request;

use Carbon\Carbon;
use App\Models\Cuti;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class CutiController extends Controller
{
    public function index()
    {
        $date = now();
        $cutis = Cuti::whereDate('tanggal', $date)->get();
        return view('dashboard.request.cuti', [
            'title' => 'Dashboard Request',
            'cutis' => $cutis,
            'date' => $date->format('M d,Y'),
        ]);
    }

    public function detail($id)
    {
        $data = Cuti::where('id', $id)->first();
        $pdf = Pdf::loadView('document.cetak_cuti', [
            'data' => $data
        ]);

        return $pdf->stream('surat-permohonan-cuti.pdf');
    }

    public function approve(Cuti $cuti)
    {
        $cuti->status = 'true';
        $cuti->save();

        return redirect()->route('request.cuti')->with('status', 'Cuti has been approved successfully.');
    }

    public function rejected(Cuti $cuti)
    {
        $cuti->status = 'false';
        $cuti->save();

        return redirect()->route('request.cuti')->with('status', 'Cuti has been rejected successfully.');
    }

    public function filter(Request $request)
    {
        $date = $request->input('date');
        $data = Cuti::whereDate('tanggal', $date);
        $formattedDate = Carbon::parse($date)->format('M d,Y');

        if ($formattedDate == now()->format('M d,Y')) {
            return redirect()->route('request.cuti');
        }

        return view('dashboard.request.cuti', [
            'title' => 'Dashboard Request',
            'cutis' => $data->get(),
            'date' => $formattedDate,
        ]);
    }
}

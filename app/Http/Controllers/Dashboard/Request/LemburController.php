<?php

namespace App\Http\Controllers\Dashboard\Request;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Lembur;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class LemburController extends Controller
{
    public function index()
    {
        $date = now();
        $lemburs = Lembur::whereDate('tanggal_lembur', $date)->get();
        return view('dashboard.request.lembur', [
            'title' => 'Dashboard Request',
            'lemburs' => $lemburs,
            'date' => $date->format('M d,Y')
        ]);
    }

    public function detail($id)
    {
        $data = Lembur::where('id', $id)->first();
        $pdf = Pdf::loadView('document.cetak_lembur', [
            'data' => $data
        ]);

        return $pdf->stream('surat-perintah-lembur.pdf');
    }

    public function approve(Lembur $lembur)
    {
        $lembur->status = 'true';
        $lembur->save();

        return redirect()->route('request.lembur')->with('status', 'Lembur has been approved successfully.');
    }

    public function rejected(Lembur $lembur)
    {
        $lembur->status = 'false';
        $lembur->save();

        return redirect()->route('request.lembur')->with('status', 'Lembur has been rejected successfully.');
    }

    public function filter(Request $request)
    {
        $lembur = new Lembur();
        $data = '';
        $date = '';
        if ($request->input('date')) {
            $date = Carbon::parse($request->date)->format('M d,Y');
            $data = $lembur->filterDate($request);
        } else {
            return redirect()->route('request.lembur');
        }

        return view('dashboard.request.lembur', [
            'title' => 'Dashboard Request',
            'lemburs' => $data,
            'date' => $date,
        ]);
    }
}

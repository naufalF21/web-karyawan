<?php

namespace App\Http\Controllers\Dashboard\Request;

use Carbon\Carbon;
use App\Models\Cuti;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\RequestCutiExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Notifications\CutiNotifikasi;
use Illuminate\Support\Facades\Notification;

class CutiController extends Controller
{
    public function index()
    {
        $date = now();
        $cutis = Cuti::whereDate('created_at', $date)->get();
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
        $user = User::find($cuti->user->id);
        $cuti->status = 'true';
        $cuti->save();
        Notification::send($user, new CutiNotifikasi($cuti->status));

        return redirect()->route('request.cuti')->with('status', 'Cuti has been approved successfully.');
    }

    public function rejected(Cuti $cuti)
    {
        $user = User::find($cuti->user->id);
        $cuti->status = 'false';
        $cuti->save();
        Notification::sendNow($user, new CutiNotifikasi($cuti->status));

        return redirect()->route('request.cuti')->with('status', 'Cuti has been rejected successfully.');
    }

    public function filter(Request $request)
    {
        $date = $request->input('date');
        $data = Cuti::whereDate('created_at', $date);
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

    public function export()
    {
        return Excel::download(new RequestCutiExport, 'cuti.xlsx');
    }
}

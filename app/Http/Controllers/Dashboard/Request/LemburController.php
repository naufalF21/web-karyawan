<?php

namespace App\Http\Controllers\Dashboard\Request;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Lembur;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Notifications\LemburNotifikasi;
use Illuminate\Support\Facades\Notification;

class LemburController extends Controller
{
    public function index()
    {
        $date = now();
        $lemburs = Lembur::whereDate('created_at', $date)->get();
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
        $user = User::find($lembur->user->id);
        $lembur->status = 'true';
        $lembur->save();
        Notification::send($user, new LemburNotifikasi($lembur->status));

        return redirect()->route('request.lembur')->with('status', 'Lembur has been approved successfully.');
    }

    public function rejected(Lembur $lembur)
    {
        $user = User::find($lembur->user->id);
        $lembur->status = 'false';
        $lembur->save();
        Notification::send($user, new LemburNotifikasi($lembur->status));

        return redirect()->route('request.lembur')->with('status', 'Lembur has been rejected successfully.');
    }

    public function filter(Request $request)
    {
        $date = $request->input('date');
        $data = Lembur::whereDate('created_at', $date);
        $formattedDate = Carbon::parse($date)->format('M d,Y');

        if ($formattedDate == now()->format('M d,Y')) {
            return redirect()->route('request.lembur');
        }

        return view('dashboard.request.lembur', [
            'title' => 'Dashboard Request',
            'lemburs' => $data->get(),
            'date' => $date,
        ]);
    }
}

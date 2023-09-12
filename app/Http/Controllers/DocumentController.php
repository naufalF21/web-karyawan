<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\User;
use App\Models\Lembur;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DocumentController extends Controller
{
    public function index()
    {
        // dd(Cache::get('form_type'));
        $cacheData = '';
        if (Cache::get('form_type')) {
            $cacheData = Cache::get('form_type');
        }
        return view('document.index', [
            'title' => 'Document',
            'cacheData' => $cacheData
        ]);
    }

    public function store(Request $request)
    {
        $type = $request->input('type');

        if ($type) {
            Cache::put('form_type', $type, now()->addDay());
            return redirect()->route('contact');
        }

        // return redirect()->route('document');
        return back()->with('docError', 'Please select one of the document types before proceeding!');
    }

    public function submit()
    {
        $document = '';
        if (Cache::get('form_type') == 'cuti') {
            $document = 'cuti';
        } else {
            $document = 'lembur';
        }

        return view('document.submit', [
            'title' => 'Document Submit',
            'document' => $document
        ]);
    }

    public function cetak()
    {
        $document = Cache::get('form_type');
        $cuti = new Cuti();
        $lembur = new Lembur();
        $data = '';

        if ($document == 'cuti') {
            $data = $cuti->latest()->first();
            $pdf = Pdf::loadView('document.cetak_cuti', [
                'data' => $data
            ]);
            return $pdf->stream('surat-permohonan-cuti.pdf');
        }

        if ($document == 'lembur') {
            $data = $lembur->latest()->first();
            $pdf = Pdf::loadView('document.cetak_lembur', [
                'data' => $data
            ]);
            return $pdf->stream('surat-perintah-lembur.pdf');
        }
    }
}

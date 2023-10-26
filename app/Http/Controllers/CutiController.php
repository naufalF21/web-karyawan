<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        return view('document.cuti.harian', [
            'title' => 'Document Cuti',
        ]);
    }

    public function indexCutiPerJam()
    {
        return view('document.cuti.perjam', [
            'title' => 'Document Cuti',
        ]);
    }

    public function store(Request $request)
    {
        $cuti = new Cuti();

        $validatedData = $request->validate([
            'jenis' => 'required',
            'tanggal' => 'required',
            'sd_tanggal' => 'required',
            'masuk_tanggal' => 'required',
            'lapor_tanggal' => 'required',
        ]);

        if ($validatedData) {
            $cuti->user_id  = auth()->user()->id;
            $cuti->jenis = $validatedData['jenis'];
            $cuti->tanggal = $validatedData['tanggal'];
            $cuti->sd_tanggal = $validatedData['sd_tanggal'];
            $cuti->masuk_tanggal = $validatedData['masuk_tanggal'];
            $cuti->lapor_tanggal = $validatedData['lapor_tanggal'];
            $cuti->save();

            return redirect()->route('submit');
        }
    }

    public function storeCutiPerJam(Request $request)
    {
        $cuti = new Cuti();

        $validatedData = $request->validate([
            'tanggal' => 'required',
            'mulai_jam_cuti' => 'required',
            'sd_jam_cuti' => 'required',
            'keterangan' => 'required',
        ]);

        if ($validatedData) {
            $cuti->user_id  = auth()->user()->id;
            $cuti->jenis = 'Harian';
            $cuti->tanggal = $validatedData['tanggal'];
            $cuti->mulai_jam_cuti = $validatedData['mulai_jam_cuti'];
            $cuti->sd_jam_cuti = $validatedData['sd_jam_cuti'];
            $cuti->keterangan = $validatedData['keterangan'];
            $cuti->save();

            return redirect()->route('submit');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CutiController extends Controller
{
    public function index()
    {
        $cacheData = '';
        if (Cache::get('form_cuti')) {
            $cacheData = Cache::get('form_cuti');
        }

        return view('document.cuti', [
            'title' => 'Document Cuti',
            'cacheData' => $cacheData
        ]);
    }

    public function store(Request $request)
    {
        $cuti = new Cuti();

        $validatedData = $request->validate([
            'jenis' => 'required',
            'dari_tanggal' => 'required',
            'sd_tanggal' => 'required',
            'masuk_tanggal' => 'required',
            'lapor_tanggal' => 'required',
        ]);

        if ($validatedData) {
            $cuti->user_id  = auth()->user()->id;
            $cuti->jenis = $validatedData['jenis'];
            $cuti->dari_tanggal = $validatedData['dari_tanggal'];
            $cuti->sd_tanggal = $validatedData['sd_tanggal'];
            $cuti->masuk_tanggal = $validatedData['masuk_tanggal'];
            $cuti->lapor_tanggal = $validatedData['lapor_tanggal'];

            $cuti->save();

            return redirect()->route('submit');
        }

        // Cache::put('form_cuti', $validatedData, now()->addDay());
        // Cache::forget('form_cuti');


    }
}

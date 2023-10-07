<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LemburController extends Controller
{
    public function index()
    {
        $cacheData = '';
        if (Cache::get('form_lembur')) {
            $cacheData = Cache::get('form_lembur');
        }

        return view('document.lembur', [
            'title' => 'Document Lembur',
            'cacheData' => $cacheData
        ]);
    }

    public function store(Request $request)
    {
        $lembur = new Lembur();

        $validatedData = $request->validate([
            'jenis' => 'required',
            'tanggal_lembur' => 'required',
            'mulai_lembur' => 'required',
            'sd_lembur' => 'required',
            'uraian_kerja' => 'required',
        ]);

        if ($validatedData) {
            $lembur->user_id = auth()->user()->id;
            $lembur->jenis = $validatedData['jenis'];
            $lembur->tanggal_lembur = $validatedData['tanggal_lembur'];
            $lembur->mulai_lembur = $validatedData['mulai_lembur'];
            $lembur->sd_lembur = $validatedData['sd_lembur'];
            $lembur->uraian_kerja = $validatedData['uraian_kerja'];

            $lembur->save();

            return redirect()->route('submit');
        }
    }
}

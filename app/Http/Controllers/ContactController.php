<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $jenis_dokumen = Cache::get('form_type');
        return view('document.contact', [
            'title' => 'Document Contact',
            'document' => $request->query('document'),
            'jenis_dokumen' => $jenis_dokumen
        ]);
    }

    public function store(Request $request)
    {
        $dokumen = Cache::get('form_type');
        $jenis_cuti = $request['jenis'];
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        // Validasi data 
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'divisi' => 'required',
        ]);

        if ($validatedData) {
            $user->contact = $validatedData['contact'];
            $user->divisi = $validatedData['divisi'];
            $user->save();

            if ($dokumen == 'cuti') {
                if ($jenis_cuti == 'harian') {
                    return redirect()->route('cuti.harian');
                } else if ($jenis_cuti == 'perjam') {
                    return redirect()->route('cuti.perjam');
                }
            }
            if ($dokumen == 'lembur') {
                return redirect()->route('lembur');
            }
        }
    }
}

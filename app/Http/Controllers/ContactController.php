<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $cacheData = '';
        if (Cache::get('form_contact')) {
            $cacheData = Cache::get('form_contact');
        }
        return view('document.contact', [
            'title' => 'Document Contact',
            'document' => $request->query('document'),
            'cacheData' => $cacheData
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $dokumen = Cache::get('form_type');

        // Validasi data 
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'divisi' => 'required',
        ]);

        Cache::put('form_contact', $validatedData, now()->addDay());

        if ($dokumen == 'cuti') {
            return redirect()->route('cuti');
        }
        if ($dokumen == 'lembur') {
            return redirect()->route('lembur');
        }
    }
}

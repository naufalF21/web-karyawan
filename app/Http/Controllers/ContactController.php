<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return view('document.contact', [
            'title' => 'Document Contact',
            'document' => $request->query('document')
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->query('document'));
        $dokumen = $request->query('document');
        if ($dokumen == 'cuti') {
            return redirect()->route('cuti');
        }
        if ($dokumen == 'lembur') {
            return redirect()->route('lembur');
        }
    }
}

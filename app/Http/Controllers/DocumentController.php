<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return view('document.index', [
            'title' => 'Document'
        ]);
    }

    public function store(Request $request)
    {
        $type = $request->input('type');

        if ($type) {
            return redirect()->route('contact', ['document' => $type]);
        }

        // return redirect()->route('document');
        return back()->with('docError', 'Please select one of the document types before proceeding!');
    }

    public function submit(Request $request)
    {
        // dd($request->query('document'));
        return view('document.submit', [
            'title' => 'Document Submit',
            'document' => $request->query('document')
        ]);
    }
}

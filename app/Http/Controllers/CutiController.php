<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        return view('document.cuti', [
            'title' => 'Document Cuti',
        ]);
    }
}

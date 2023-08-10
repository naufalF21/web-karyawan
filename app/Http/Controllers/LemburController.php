<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LemburController extends Controller
{
    public function index()
    {
        return view('document.lembur', [
            'title' => 'Document Lembur',
        ]);
    }
}

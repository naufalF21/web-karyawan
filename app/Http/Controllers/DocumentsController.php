<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index()
    {
        return view('documents.index', [
            'title' => 'Documents'
        ]);
    }

    public function contact()
    {
        return view('documents.contact', [
            'title' => 'Documents - Contact',
        ]);
    }

    public function cuti()
    {
        return view('documents.cuti', [
            'title' => 'Documents - Cuti',
        ]);
    }

    public function lembur()
    {
        return view('documents.lembur', [
            'title' => 'Documents - Lembur',
        ]);
    }

    public function submit()
    {
        return view('documents.submit', [
            'title' => 'Documents - Submit',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapDokumenController extends Controller
{
    public function index()
    {
        return view('rekap-dokumen.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaIzinController extends Controller
{
    public function index()
    {
        return view('izin.index');
    }

    public function create()
    {
        return view('izin.create');
    }
}

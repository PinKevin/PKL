<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaHakAksesController extends Controller
{
    public function index()
    {
        return view('hak-akses.index');
    }

    public function create()
    {
        return view('hak-akses.create');
    }
}

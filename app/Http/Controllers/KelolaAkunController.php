<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaAkunController extends Controller
{
    public function index()
    {
        return view('akun.index');
    }
}

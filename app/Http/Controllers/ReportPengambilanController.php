<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportPengambilanController extends Controller
{
    public function index()
    {
        return view('report-pengambilan.index');
    }
}

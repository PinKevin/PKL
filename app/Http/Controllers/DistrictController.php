<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        return view('district.index');
    }
}

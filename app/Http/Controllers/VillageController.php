<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function index()
    {
        return view('village.index');
    }
}

<?php

namespace App\Http\Controllers;

class BantuanController extends Controller
{
    public function index()
    {
        return view('bantuan.index');
    }

    public function dashboard()
    {
        return view('bantuan.dashboard');
    }

    public function penerimaan()
    {
        return view('bantuan.penerimaan');
    }

    public function peminjaman()
    {
        return view('bantuan.peminjaman');
    }

    public function pengembalian()
    {
        return view('bantuan.pengembalian');
    }

    public function pengambilan()
    {
        return view('bantuan.pengambilan');
    }

    public function report()
    {
        return view('bantuan.report');
    }

    public function data()
    {
        return view('bantuan.data');
    }
}

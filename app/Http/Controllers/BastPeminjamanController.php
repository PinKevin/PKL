<?php

namespace App\Http\Controllers;

use App\Models\BastPeminjaman;
use App\Http\Requests\StoreBastPeminjamanRequest;
use App\Http\Requests\UpdateBastPeminjamanRequest;

class BastPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBastPeminjamanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BastPeminjaman $bastPeminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BastPeminjaman $bastPeminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBastPeminjamanRequest $request, BastPeminjaman $bastPeminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BastPeminjaman $bastPeminjaman)
    {
        //
    }

    public function cetakBast($id)
    {
        return $id;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\SuratRoya;
use App\Http\Requests\StoreSuratRoyaRequest;
use App\Http\Requests\UpdateSuratRoyaRequest;

class SuratRoyaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('surat-roya.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat-roya.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuratRoyaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('surat-roya.show', [
            'id' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('surat-roya.edit', [
            'id' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuratRoyaRequest $request, SuratRoya $suratRoya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratRoya $suratRoya)
    {
        //
    }
}

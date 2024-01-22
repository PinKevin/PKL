<?php

namespace App\Http\Controllers;

use App\Models\Debitur;
use Illuminate\Http\Request;

class DebiturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('debitur.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Debitur $debitur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Debitur $debitur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Debitur $debitur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Debitur $debitur)
    {
        //
    }
}

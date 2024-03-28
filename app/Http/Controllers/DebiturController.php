<?php

namespace App\Http\Controllers;

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
        return view('debitur.create');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('debitur.show', [
            'id' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('debitur.edit', [
            'id' => $id
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Notaris;
use App\Http\Requests\StoreNotarisRequest;
use App\Http\Requests\UpdateNotarisRequest;

class NotarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notaris.index');
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
    public function store(StoreNotarisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('notaris.show', [
            'id' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notaris $notaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotarisRequest $request, Notaris $notaris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notaris $notaris)
    {
        //
    }
}

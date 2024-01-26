<?php

namespace App\Http\Controllers;

use App\Models\StaffCabang;
use App\Http\Requests\StoreStaffCabangRequest;
use App\Http\Requests\UpdateStaffCabangRequest;

class StaffCabangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('staff-cabang.index');
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
    public function store(StoreStaffCabangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffCabang $staffCabang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffCabang $staffCabang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffCabangRequest $request, StaffCabang $staffCabang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffCabang $staffCabang)
    {
        //
    }
}

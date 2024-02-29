<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showPage()
    {
        return view('dashboard');
    }

    public function showAdminDashboard()
    {
        return view('admin-dashboard');
    }
}

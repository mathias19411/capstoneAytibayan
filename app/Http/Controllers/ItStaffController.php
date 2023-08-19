<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItStaffController extends Controller
{
    public function ItStaffDashboard()
    {
        return view('ITStaff.itstaff_dashboard');
    } // End Method
}

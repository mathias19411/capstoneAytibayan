<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{
    public function BeneficiaryDashboard()
    {
        return view('Beneficiary.beneficiary_dashboard');
    } // End Method
}

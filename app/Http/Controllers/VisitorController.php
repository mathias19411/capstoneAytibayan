<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function VisitorDashboard()
    {
        return view('Visitor.visitor_index');
    } // End Method
}

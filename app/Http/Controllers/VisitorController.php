<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function VisitorHome()
    {
        toastr()->timeOut(10000)->addInfo('Welcome to the Website of APAO Region V!');

        return view('Visitor.visitor_index');
    } // End Method
}

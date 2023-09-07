<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Registration $registration)
    {
        $registration = new registration;
        $registration->first_name = request('first_name');
        $registration->middle_name = request('middle_name');
        $registration->last_name = request('last_name');
        $registration->contact = request('phone_number');
        $registration->role = request('inputRole');
        $registration->address = request('primaryAddress');
        $registration->city = request('inputCity');
        $registration->province = request('inputProvince');
        $registration->zip = request('inputZip');

        $registration->save();

        return redirect()->back()->with('success', 'Data inserted successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        //
    }
}

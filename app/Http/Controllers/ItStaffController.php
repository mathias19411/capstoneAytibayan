<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ItStaffController extends Controller
{
    public function ItStaffHome()
    {
        return view('ITStaff.home');
    } // End Method

    /**
     * Destroy an authenticated session.
     */
    public function ItStaffLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Account Logged Out Successfully!',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } // End Method

    public function ItStaffAddProgram()
    {
        return view('ITStaff.addprogram');
    } // End Method

    public function ItStaffEditProgram()
    {
        return view('ITStaff.edit_program');
    } // End Method

    public function ITStaffAnnouncement()
    {
        return view('ITStaff.announcement');
    } // End Method
    
    public function ITStaffEvent()
    {
        return view('ITStaff.event');
    } // End Method
    public function ITStaffRegistration()
    {
        return view('ITStaff.registration');
    } // End Method
}

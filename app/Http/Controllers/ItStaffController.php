<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ItStaffController extends Controller
{
    public function ItStaffHome()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        $firstName = auth()->user()->first_name;
        $middleName = auth()->user()->middle_name;
        $lastName = auth()->user()->last_name;
        toastr()->timeOut(7500)->addInfo('Welcome back ' . $firstName . ' ' . $middleName . ' ' . $lastName . '!');
        return view('ITStaff.home', compact('userProfileData'));
    } // End Method

    /**
     * Destroy an authenticated session.
     */
    public function ItStaffLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // toastr()->addSuccess('Your Account has been logged out!');
        toastr()->timeOut(10000)->addInfo('Your Account has been logged out!');
        // toastr()->addWarning('Your Account has been logged out!');
        // toastr()->addError('Your Account has been logged out!');

        return redirect('/login');
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

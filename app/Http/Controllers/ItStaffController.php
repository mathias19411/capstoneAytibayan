<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ItStaffController extends Controller
{
    public function ItStaffHome()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        return view('ITStaff.home', compact('userProfileData'));
    } // End Method

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

    public function ITStaffViewProfile()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        return view('ITStaff.profile', compact('userProfileData'));
    } // End Method

    public function ITStaffEditProfile(Request $request)
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userData = User::find($id);

        $userData->first_name = $request->first_name;
        $userData->middle_name = $request->middle_name;
        $userData->last_name = $request->last_name;
        $userData->phone = $request->phone;
        $userData->primary_address = $request->primary_address;
        $userData->city = $request->city;
        $userData->province = $request->province;
        $userData->zip = $request->zip;

        if ($request->file('photo'))
        {
            $file = $request->file('photo');

            @unlink(public_path('Uploads/ITStaff_Images/'.$userData->photo));

            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('Uploads/ITStaff_Images'),$fileName);
            $userData['photo'] = $fileName;
        }
        $userData->save();

        toastr()->timeOut(10000)->addSuccess('Your Profile has been Updated!');

        return redirect()->back();
    } // End Method
    
    public function ITStaffViewChangePassword()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        return view('ITStaff.pass', compact('userProfileData'));
    } // End Method

    public function ITStaffEditChangePassword(Request $request)
    {
        //Validation
        $request->validate([
            'inputOldPassword' => 'required',
            'inputNewPassword' => 'required|confirmed' 
        ]);

        ///Match the old password
        if (!Hash::check($request->inputOldPassword, auth::user()->password))
        {
        //confirmation message
        toastr()->timeOut(10000)->addError('Old Password does not match!');

        return redirect()->back();
        }

        //Update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->inputNewPassword) //inputNewPassword field name from name="inputNewPassword" in admin_change_password.blade.php
        ]);

        toastr()->timeOut(10000)->addSuccess('Your Password has been Updated!');

        return redirect()->back();
    } // End Method
}

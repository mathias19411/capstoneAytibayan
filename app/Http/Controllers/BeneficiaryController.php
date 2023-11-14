<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\announcement;
use App\Models\inquiries;
use App\Models\progress;
use App\Models\events;


class BeneficiaryController extends Controller
{
    public function BeneficiaryHome()
    {
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        $binhi = "ABAKA";
        $public = "PUBLIC";
        $announcement = announcement::where(function ($query) use ($binhi, $public) {
            $query->where('to', $binhi)->orWhere('to', $public);})->get();

        return view('Beneficiary.home', compact('userProfileData', 'announcement'));    
    } // End Method

    public function BeneficiaryLogout(Request $request)
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

    public function BeneficiaryUpdates()
    {
        return view('Beneficiary.update');
    } // End Method

    public function BeneficiarySchedule()
    {
        return view('Beneficiary.schedule');
    } // End Method

    public function BeneficiaryInquiry()
    {
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        return view('Beneficiary.inquiry', compact('userProfileData'));

    } // End Method

    public function BeneficiaryInquiryStore(Request $request){

    // Validate the request
    $validatedData = $request->validate([
        'fullname' => 'required|string|max:255',
        'recipient' => 'required|string',
        'email' => 'required|email',
        'message' => 'required|string',
        'date' => 'required|date',
        'contact' => 'required|string',
        'attachment' => 'file',
    ]);

    // Check if the image key exists in the validated data array
    if (isset($validatedData['attachment'])) {
        // Get the image file
        $file = $request->file('attachment');

        // Generate a unique filename for the image file
        $filename = date('YmdHi') . $file->getClientOriginalName();

    } else {
        // Assign an empty string to the filename variable
        $filename = '';
    }

    // Set the image attribute of the event model to the filename
    $validatedData['attachment'] = $filename;

    // Check if validation passes
    if ($validatedData) {
        // Insert data into the database
        $inquiry = inquiries::create([
            'fullname' => $validatedData['fullname'],
            'to' => $validatedData['recipient'],
            'email' => $validatedData['email'],
            'contacts' => $validatedData['contact'],
            'date' => $validatedData['date'],
            'message' => $validatedData['message'],
            'attachment' => $validatedData['attachment'],
        ]);
        $inquiry->save();

        // If the attachment file is not empty, store it in the database

        return redirect()->back()->with('success', 'New Inquiry Added!');
    } else {
        return redirect()->back()->with('error', 'Validation failed. Please check your input.');
    }
}// End Method//End Method

    public function BeneficiaryViewProfile()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        return view('Beneficiary.benefprofile', compact('userProfileData'));
    } // End Method

    public function BeneficiaryEditProfile(Request $request)
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userData = User::find($id);

        $userData->first_name = $request->first_name;
        $userData->middle_name = $request->middle_name;
        $userData->last_name = $request->last_name;
        $userData->phone = $request->phone;
        $userData->barangay = $request->primary_address;
        $userData->city = $request->city;
        $userData->province = $request->province;
        $userData->zip = $request->zip;

        if ($request->file('photo'))
        {
            $file = $request->file('photo');

            @unlink(public_path('Uploads/Beneficiary_Images/'.$userData->photo));

            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('Uploads/Beneficiary_Images'),$fileName);
            $userData['photo'] = $fileName;
        }
        $userData->save();

        toastr()->timeOut(10000)->addSuccess('Your Profile has been Updated!');

        return redirect()->back();
    } // End Method
    
    public function BeneficiaryViewChangePassword()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        return view('Beneficiary.benefpass', compact('userProfileData'));
    } // End Method

    public function BeneficiaryEditChangePassword(Request $request)
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

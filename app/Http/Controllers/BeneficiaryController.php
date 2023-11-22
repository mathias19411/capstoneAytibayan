<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\announcement;
use App\Models\Program;
use App\Models\inquiries;
use App\Models\progress;
use App\Models\events;
use App\Notifications\InactiveStatusNotif;
use App\Notifications\AccountUpdateNotif;
use App\Notifications\PasswordUpdateNotif;


class BeneficiaryController extends Controller
{
    public function BeneficiaryHome(Request $request)
    {
        $id = AUTH::user()->id;

       // Get the programId of the user table
       $programId = User::where('id', $id)->pluck('program_id');

       // Get the programname of the program table
       $programName = trim(implode(' ', Program::where('id', $programId)->pluck('program_name')->toArray()));
       $announcement = announcement::where(function ($query) use ($programName) {
           $query->where('to', $programName);})->get();
        $events = events::where(function ($query) use ($programName) {
            $query->where('to', $programName);})->get(); 

        return view('Beneficiary.home', compact('announcement', 'programName', 'events'));    
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

        // Get the programId of the user table
        $programId = User::where('id', $id)->pluck('program_id');

        // Get the programname of the program table
        $programName = trim(implode(' ', Program::where('id', $programId)->pluck('program_name')->toArray()));

        return view('Beneficiary.inquiry', compact('userProfileData', 'programName'));

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

        //notify on email
        $userData->notify(new AccountUpdateNotif());

        //send via sms
        // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS($userData->phone, "apao", "Your account for Albay Provincial Agriculture Office has been successfully updated!")
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     toastr()->timeOut(7500)->addSuccess('The user\'s credentials has been sent via email and SMS!');
        // } else {
        //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
        // }

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
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userData = User::find($id);

        //Validation
        $request->validate([
            'inputOldPassword' => 'required',
            'inputNewPassword' => 'required|confirmed' 
        ]);

        ///Match the old password
        if (!Hash::check($request->inputOldPassword, $userData->password))
        {
        //confirmation message
        toastr()->timeOut(10000)->addError('Old Password does not match!');

        return redirect()->back();
        }

        //Update the new password
        $userData->update([
            'password' => Hash::make($request->inputNewPassword) //inputNewPassword field name from name="inputNewPassword" in admin_change_password.blade.php
        ]);

        //notify on email
        $userData->notify(new PasswordUpdateNotif());

        //send via sms
        // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS($userData->phone, "apao", "Your account password for Albay Provincial Agriculture Office has been successfully updated!")
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     toastr()->timeOut(7500)->addSuccess('The user\'s credentials has been sent via email and SMS!');
        // } else {
        //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
        // }

        toastr()->timeOut(10000)->addSuccess('Your Password has been Updated!');

        return redirect()->back();
    } // End Method

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\ReplyMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\announcement;
use App\Models\Program;
use App\Models\inquiries;
use App\Models\progress;
use App\Models\events;
use App\Models\Updates;
use App\Models\Role;



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
        $id = AUTH::user()->id;

        // Get the programId of the user table
       $programId = User::where('id', $id)->pluck('program_id');
       $roleId = User::where('id', $id)->pluck('role_id');
       $roleName = trim(implode(' ', Role::where('id', $roleId)->pluck('role_name')->toArray()));

       // Get the programname of the program table
       $programName = trim(implode(' ', Program::where('id', $programId)->pluck('program_name')->toArray()));
        $userEmail = trim(implode(' ', User::where('id', $id)->pluck('email')->toArray()));
        $updates = Updates::where(function ($query) use ($userEmail) {
            $query->where('email', $userEmail);})->get();
        return view('Beneficiary.update', compact('updates', 'userEmail', 'programName', 'roleName'));
    } // End Method

    public function BeneficiaryUpdateStore(Request $request){

        // Validate the request
        $validatedData = $request->validate([
            'email' => 'required|email',
            'date' => 'required|date',
            'benef_of' => 'required|string',
            'title' => 'required|string',
            'image' => 'image',
        ]);
    
        // Check if the image key exists in the validated data array
        if (isset($validatedData['image'])) {
            // Get the image file
            $file = $request->file('image');
    
            // Generate a unique filename for the image file
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move('Uploads/Updates/', $filename);
    
        } else {
            // Assign an empty string to the filename variable
            $filename = '';
        }
    
        // Set the image attribute of the event model to the filename
        $validatedData['image'] = $filename;
    
        // Check if validation passes
        if ($validatedData) {
            // Insert data into the database
            $updates = Updates::create([
                'email' => $validatedData['email'],
                'date' => $validatedData['date'],
                'benef_of'=> $validatedData['benef_of'],
                'title'=> $validatedData['title'],
                'image' => $validatedData['image'],
            ]);
            $updates->save();
    
            // If the attachment file is not empty, store it in the database
    
            return redirect()->back()->with('success', 'New Update Added!');
        } else {
            return redirect()->back()->with('error', 'Validation failed. Please check your input.');
        }
    }// End Method//End Method
    public function BeneficiaryUpdateUpdate(Request $request)
{
    $id = $request->update_id;
    // Validate the request
    $validatedData = $request->validate([
        'email' => 'required|email',
        'benef_of' => 'required|string',
        'title' => 'required|string',
        'image' => 'image',
    ]);

    // Check if the image key exists in the validated data array
    if (isset($validatedData['image'])) {
        // Get the image file
        $file = $request->file('image');

        // Generate a unique filename for the image file
        $filename = date('YmdHi') . $file->getClientOriginalName();

        // Move the image file to the 'Uploads/Updates/' directory
        $file->move('Uploads/Updates/', $filename);
    } else {
        // Assign an empty string to the filename variable
        $filename = '';
    }

    // Set the image attribute of the event model to the filename
    $validatedData['image'] = $filename;

    // Check if validation passes
    if ($validatedData) {
        // Update data in the database
        $update = Updates::findOrFail($id);
        $update->update($validatedData);

        return redirect()->back()->with('success', 'Update Successful!');
    } else {
        return redirect()->back()->with('error', 'Validation failed. Please check your input.');
    }
}
    

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
       $roleId = User::where('id', $id)->pluck('role_id');
       $roleName = trim(implode(' ', Role::where('id', $roleId)->pluck('role_name')->toArray()));


        // Get the programname of the program table
        $programName = trim(implode(' ', Program::where('id', $programId)->pluck('program_name')->toArray()));
        $programEmail = trim(implode(' ', Program::where('program_name', $programName)->pluck('email')->toArray()));
        $userEmail = trim(implode(' ', User::where('id', $id)->pluck('email')->toArray()));
        $inquiry = inquiries::where(function ($query) use ($userEmail) {
            $query->where('email', $userEmail);})->get();

        return view('Beneficiary.inquiry', compact('inquiry', 'userProfileData', 'programName', 'roleName', 'programEmail'));

    } // End Method

    public function BeneficiaryInquiryStore(Request $request){

    // Validate the request
    $validatedData = $request->validate([
        'fullname' => 'required|string|max:255',
        'from'=> 'string',
        'recipient' => 'required|string',
        'programEmail'=> 'string',
        'email' => 'required|email',
        'message' => 'required|string',
        'date' => 'required|date',
        'contact' => 'required|string',
    ]);

    $senderName = $validatedData['fullname'];

    $recipientName = $validatedData['recipient'];

    $recipientEmail = $validatedData['programEmail'];

    $subject = $validatedData['from'];

    $body = $validatedData['message'];

    // Check if validation passes
    if ($validatedData) {
        // Insert data into the database
        $inquiry = inquiries::create([
            'fullname' => $validatedData['fullname'],
            'from'=> $validatedData['from'],
            'to' => $validatedData['recipient'],
            'programEmail'=> $validatedData['programEmail'],
            'email' => $validatedData['email'],
            'contacts' => $validatedData['contact'],
            'date' => $validatedData['date'],
            'message' => $validatedData['message'],
        ]);
        Mail::to($recipientEmail)->send(new ReplyMailable($subject, $body, $senderName, $recipientName));
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

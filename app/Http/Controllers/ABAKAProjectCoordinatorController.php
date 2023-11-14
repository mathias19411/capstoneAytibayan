<?php

namespace App\Http\Controllers;

use App\Mail\FinancialAssistanceStatusUpdate;
use App\Mail\ReplyMailable;
use App\Models\announcement;
use App\Models\events;
use App\Models\Financialassistance;
use App\Models\Financialassistancestatus;
use App\Models\File;
use App\Models\inquiries;
use App\Models\Program;
use App\Models\progress;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use App\Models\Assistancesteps;
use App\Notifications\FinancialAssistanceStatusRejected;
use App\Notifications\FinancialAssistanceStatusUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ABAKAProjectCoordinatorController extends Controller
{
    public function ProjectCoordinatorHome()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        $userRole = AUTH::user()->role->role_name;

        $userProgramId = AUTH::user()->program->id;

        $abakaBeneficiaries = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->get();

        //total benef count
        $abakaBeneficiariesCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->count();

        //total active benef
        $abakaActiveCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->whereHas('status', function ($query) {
            $query->where('status_name', 'Active');
        })->count();

        //total inactive benef
        $abakaInactiveCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->whereHas('status', function ($query) {
            $query->where('status_name', 'Inactive');
        })->count();

        return view('ABAKA_Project_Coordinator.beneficiary', compact('userProfileData', 'abakaBeneficiaries', 'abakaBeneficiariesCount', 'abakaActiveCount', 'abakaInactiveCount'));
    } // End Method

    public function ProjectCoordinatorLogout(Request $request)
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

    public function ProjCoordinatorAnnouncement()
    {
        $binhi = "ABAKA";
        $public = "PUBLIC";
        $announcement = announcement::where(function ($query) use ($binhi, $public) {
            $query->where('to', $binhi)->orWhere('to', $public);})->get();

        return view('ABAKA_Project_Coordinator.announcement', ['announcement'=>$announcement]);
    } // End Method

    public function ProjectCoordinatorAnnouncementEdit($id)
    {
        $announcement = announcement::findOrFail($id);

        return view('ABAKA_Project_Coordinator.announcement', compact('announcement'));
    } // End Method

    public function ProjCoordinatorAnnouncementStore(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'to' => 'required|string',
            'message' => 'required|string',
        ]);

        // Check if validation passes
        if ($validatedData) 
        {
            // Insert data into the database
            announcement::insert([
                'title' => $validatedData['title'],
                'date' => $validatedData['date'],
                'to' => $validatedData['to'],
                'message' => $validatedData['message'],
            ]);

            return redirect()->back()->with('success', 'New Announcement Added!');
        } else {
            return redirect()->back()->with('error', 'Validation failed. Please check your input.');
    }
    } // End Method

    public function ProjCoordinatorAnnouncementUpdate(Request $request)
    {
        $aid = $request->announcement_id;
        
        announcement::findOrFail($aid)->update([
            'title'=>$request->title,
            'to'=>$request->to,
            'message'=>$request->message,
        ]);

        return redirect()->back()->with('success', 'Announcement is Updated!');
    } // End Method

    public function ProjCoordinatorAnnouncementDelete(Request $request)
    {
        $id = $request->delete_id;
        // Find the record you want to delete by its primary key
        $recordToDelete = announcement::find($id);

        // Check if the record exists
        if ($recordToDelete) {
            // Delete the record
            $recordToDelete->delete();

            // Optionally, you can redirect back to a page or return a response
            return redirect()->back()->with('success', 'Announcement is Deleted!');
        } else {
            // Record not found
            // You can redirect back with an error message or handle it as needed
            return redirect()->back()->with('error', 'Record Not Found!');
        }
    } // End Method

    public function ProjCoordinatorEvent()
    {
        $binhi = "ABAKA";
        $public = "PUBLIC";
        $event = events::where(function ($query) use ($binhi, $public) {
            $query->where('to', $binhi)->orWhere('to', $public);})->get();

        return view('ABAKA_Project_Coordinator.event', ['event'=>$event]);
    } // End Method

    public function ProjectCoordinatorEventEdit($id)
    {
        $event = events::findOrFail($id);

        return view('ABAKA_Project_Coordinator.event', compact('event'));
    } // End Method

    public function ProjCoordinatorEventStore(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'date' => 'required|date',
        'to' => 'required|string',
        'message' => 'required|string',
        'image' => 'image'
    ]);

    // Check if the image key exists in the validated data array
    if (isset($validatedData['image'])) {
        // Get the image file
        $file = $request->file('image');

        // Generate a unique filename for the image file
        $filename = date('YmdHi') . $file->getClientOriginalName();

    } else {
        // Assign an empty string to the filename variable
        $filename = '';
    }

    // Set the image attribute of the event model to the filename
    $validatedData['image'] = $filename;

    // Check if validation passes
    if ($validatedData) {
        // Insert data into the database
        $event = events::create([
            'title' => $validatedData['title'],
            'date' => $validatedData['date'],
            'to' => $validatedData['to'],
            'message' => $validatedData['message'],
            'image' => $validatedData['image'],
        ]);
        $event->save();

        // If the attachment file is not empty, store it in the database

        return redirect()->back()->with('success', 'New Event Added!');
    } else {
        return redirect()->back()->with('error', 'Validation failed. Please check your input.');
    }
}




    public function ProjCoordinatorEventUpdate(Request $request)
    {
        $aid = $request->event_id;
        
        events::findOrFail($aid)->update([
            'title'=>$request->title,
            'to'=>$request->to,
            'image'=>$request->image,
            'message'=>$request->message,
        ]);

        return redirect()->back()->with('success', 'Event is Updated!');
    } // End Method

    public function ProjCoordinatorEventDelete(Request $request)
    {
        $id = $request->event_id;
        // Find the record you want to delete by its primary key
        $recordToDelete = events::find($id);

        // Check if the record exists
        if ($recordToDelete) {
            // Delete the record
            $recordToDelete->delete();

            // Optionally, you can redirect back to a page or return a response
            return redirect()->back()->with('success', 'Event is Deleted!');
        } else {
            // Record not found
            // You can redirect back with an error message or handle it as needed
            return redirect()->back()->with('error', 'Record Not Found!');
        }
    } // End Method

    public function ProjCoordinatorInquiry()
    {
        $binhi = "ABAKA";
        $public = "PUBLIC";
        $inquiry = inquiries::where(function ($query) use ($binhi, $public) {
            $query->where('to', $binhi)->orWhere('to', $public);})->get();


        return view('ABAKA_Project_Coordinator.inquiry', ['inquiry'=>$inquiry]);
    } // End Method


    public function ProjectCoordinatorInquiryEdit($id)
    {
        $event = inquiries::findOrFail($id);

        return view('ABAKA_Project_Coordinator.event', compact('event'));
    } // End Method

    public function ProjectCoordinatorInquiryReply(Request $request)
    {
        // Get the email address of the recipient
        $recipientEmail = $request->get('recipient_email');

        // Get the name of the recipient
        $recipientName = $request->get('fullname');

        // Get the subject of the email
        $subject = $request->get('subject');

        // Get the body of the email
        $body = $request->get('body');

        // Get the attachment
        $attachment = $request->file('attachment');

        if ($attachment !== null) {
            // The file was uploaded, proceed with sending the email.

            // Ensure the attachment is not null
            if ($attachment->isValid()) {
                // If the attachment is valid, you can proceed with sending the email.

                // Reply to the email message with a body and an attachment
                Mail::to($recipientEmail)->send(new ReplyMailable($subject, $body, $attachment, $recipientName));

                // Redirect back to the previous page
                return redirect()->back()->with('success', 'Message Sent!');
            } else {
                // Handle the case when the uploaded file is not valid.
                return redirect()->back()->with('error', 'Invalid file uploaded');
            }
        } 
        else if ($attachment === null) {    

            Mail::to($recipientEmail)->send(new ReplyMailable($subject, $body, null, $recipientName));

            // Redirect back to the previous page
            return redirect()->back()->with('success', 'Message Sent!');
        }
        else {
            // Handle the case when no file was uploaded.
            return redirect()->back()->with('error', 'No file uploaded');
        }
    }// End of Method


    public function ProjCoordinatorInquiryDelete(Request $request)
    {
        $id = $request->event_id;
        // Find the record you want to delete by its primary key
        $recordToDelete = inquiries::find($id);

        // Check if the record exists
        if ($recordToDelete) {
            // Delete the record
            $recordToDelete->delete();

            // Optionally, you can redirect back to a page or return a response
            return redirect()->back()->with('success', 'Event is Deleted!');
        } else {
            // Record not found
            // You can redirect back with an error message or handle it as needed
            return redirect()->back()->with('error', 'Record Not Found!');
        }
    } // End Method
    
    public function ProjCoordinatorProgress()
    {
        $progress = progress::all();

        $userRole = AUTH::user()->role->role_name;

        $userProgramId = AUTH::user()->program->id;

        //total benef count
        $abakaBeneficiariesCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->count();

        //total active benef
        $abakaActiveCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->whereHas('status', function ($query) {
            $query->where('status_name', 'Active');
        })->count();

        //total inactive benef
        $abakaInactiveCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->whereHas('status', function ($query) {
            $query->where('status_name', 'Inactive');
        })->count();

        $totalActiveAndInactiveCount = [$abakaActiveCount, $abakaInactiveCount];

        $abakaBeneficiaries = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->get();


        // $users = User::whereHas('role', function ($query) {
        //     $query->where('role_name', 'beneficiary');
        // })->whereHas('program', function ($query) use ($programId) {
        //     $query->where('id', $programId);
        // })->get();

        $assistanceStatuses = Financialassistancestatus::all();

        $assistanceUnsettledStatus = Financialassistancestatus::where('financial_assistance_status_name', 'unsettled')->first();

        return view('ABAKA_Project_Coordinator.progress', compact('progress', 'abakaBeneficiariesCount', 'abakaActiveCount', 'abakaInactiveCount', 'abakaBeneficiaries', 'assistanceStatuses', 'totalActiveAndInactiveCount', 'assistanceUnsettledStatus'));
    } // End Method

    public function ProjCoordinatorProgressAdd(Request $request)
    {
        $userId = $request->userId;

        // Validate form inputs
        $validatedData = $request->validate([
            'project' => ['required', 'string', 'max:70'],
            'amount' => ['required', 'numeric'],
            'hectares' => ['required', 'numeric'],
        ]);

        if ($validatedData)
        {
            Financialassistance::create([
                'user_id' => $userId,
                'project' => $validatedData['project'],
                'amount' => $validatedData['amount'],
                'number_of_hectares' => $validatedData['hectares'],
                'financialassistancestatus_id' => 2,
            ]);

            /** @var \App\Models\User $user **/
            //Access the authenticated user's id
            $user = User::findOrFail($userId);

            $user->notify(new FinancialAssistanceStatusUpdated());
        }


        toastr()->timeOut(10000)->addSuccess('A new Beneficiary Project has been added!');

        return redirect()->route('abakaprojectcoordinator.progress');
    } // End Method

    public function ProjCoordinatorProgressUpdate(Request $request)
    {
        $assistanceId = $request->assistanceId;

        $userId = $request->userId;

        $financialAssistanceId = Financialassistance::findOrFail($assistanceId);

        if ($request->inputAssistanceUpdate == 6) {

            $financialAssistanceId->delete();

            /** @var \App\Models\User $user **/
            //Access the authenticated user's id
            $user = User::findOrFail($userId);

            $user->notify(new FinancialAssistanceStatusRejected());
            // Status is "rejected," delete the associated row

        }
        else
        {
            $financialAssistanceId->update([
                'financialassistancestatus_id' => $request->inputAssistanceUpdate,
            ]);

            // Send an email notification to the user
            if (in_array($request->inputAssistanceUpdate, [2, 3, 4, 5])) {
                // Use the IDs that correspond to "pending," "approved," and "disbursed" status
                $financialAssistanceId->user->notify(new FinancialAssistanceStatusUpdated());
        }
        }

        toastr()->timeOut(10000)->addSuccess('Beneficiary Financial Assistance Status has been updated!');

        return redirect()->route('abakaprojectcoordinator.progress');
    } // End Method

    public function ProjCoordinatorViewProfile()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        return view('ABAKA_Project_Coordinator.profile', compact('userProfileData'));
    } // End Method

    public function ProjCoordinatorEditProfile(Request $request)
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

            @unlink(public_path('Uploads/Coordinator_Images/'.$userData->photo));

            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('Uploads/Coordinator_Images'),$fileName);
            $userData['photo'] = $fileName;
        }
        $userData->save();

        toastr()->timeOut(10000)->addSuccess('Your Profile has been Updated!');

        return redirect()->back();
    } // End Method
    
    public function ProjCoordinatorViewChangePassword()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        return view('ABAKA_Project_Coordinator.pass', compact('userProfileData'));
    } // End Method

    public function ProjCoordinatorEditChangePassword(Request $request)
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

    public function ProjCoordinatorRegisterView()
    {
        //Access the authenticated user's id
        $programId = AUTH::user()->program_id;
        // $users = User::orderBy('id', 'asc')->get();
        $roles = Role::all();
        $statuses = Status::all();

        $users = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($programId) {
            $query->where('id', $programId);
        })->get();

        return view('ABAKA_Project_Coordinator.registerView', compact('users', 'roles', 'statuses'));
    } // End Method

    public function ProjCoordinatorRegisterEditUser(Request $request)
    {
        $userId = $request->id;

        $userData = User::findOrFail($userId);

        $userData->update([
            'status_id' =>$request->inputStatus,
        ]);

        $userData->save();

        toastr()->timeOut(10000)->addSuccess('User data has been updated successfully!');
        
        return redirect()->back();
    } // End Method

    public function notifyBeneficiaries(Request $request)
    {
        try {
            $description = $request->input('description');

            // Get authenticated user with the role "coordinator"
            $coordinator = auth()->user();

            // Find beneficiaries with the same "program_id"
            $beneficiaries = User::where('role_id', 7)
                ->where('program_id', $coordinator->program_id)
                ->get();

            // Send emails to beneficiaries
            foreach ($beneficiaries as $beneficiary) {
                // Send email using the FinancialAssistanceStatusUpdate Mailable
                Mail::to($beneficiary->email)->send(new FinancialAssistanceStatusUpdate($description));
            }

            return response()->json(['message' => 'Notification sent successfully']);
        } catch (\Exception $e) {
        return response()->json(['error' => 'Error sending notification: ' . $e->getMessage()], 500);
    }
    }
}

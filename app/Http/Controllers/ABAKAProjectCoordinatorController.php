<?php

namespace App\Http\Controllers;

use App\Mail\FinancialAssistanceStatusUpdate;
use App\Mail\ReplyMailable;
use App\Mail\ReplyMailableSchedule;
use App\Models\announcement;
use App\Models\Assistancesteps;
use App\Models\events;
use App\Models\File;
use App\Models\Financialassistance;
use App\Models\Financialassistancehistory;
use App\Models\Financialassistancestatus;
use App\Models\inquiries;
use App\Models\Loan;
use App\Models\Loanstatus;
use App\Models\Program;
use App\Models\progress;
use App\Models\Projects;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\Status;
use App\Models\Updates;
use App\Models\User;
use App\Notifications\AccountUpdateNotif;
use App\Notifications\BlacklistNotification;
use App\Notifications\FinancialAssistanceStatusRejected;
use App\Notifications\FinancialAssistanceStatusUpdated;
use App\Notifications\InactiveStatusNotif;
use App\Notifications\PasswordUpdateNotif;
use App\Notifications\RestoreNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\WebsiteNotifications;
use Illuminate\Validation\Rules\Password;



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

        $programName = trim(implode(' ', Program::where('id', $userProgramId)->pluck('program_name')->toArray()));

        $updates = Updates::where(function ($query) use ($programName) {
            $query->where('benef_of', $programName);})->get();
        
        $public = 'Public';
        $project = Projects::where(function ($query) use ($programName, $public) {
                $query->where('recipient', $programName)->orwhere('recipient', $public);})->get();
        
        $benefSchedules = Schedule::where(function ($query) use ($programName) {
                $query->where('from', $programName);})->get();
        
       $programLogo = trim(implode(' ', Program::where('program_name', $programName)->pluck('image')->toArray()));

        $abakaBeneficiaries = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->where('blacklisted', false)->get();

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

        return view('ABAKA_Project_Coordinator.beneficiary', compact('userProfileData', 'abakaBeneficiaries', 'abakaBeneficiariesCount', 'abakaActiveCount', 'abakaInactiveCount', 'programName', 'updates', 'project', 'benefSchedules', 'programLogo'));
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
    public function UpdateMarkAsRead(Request $request){
        
        $benef_email = $request->benef_email;
        // Assuming you have an Eloquent model named Updates
        Updates::where(function ($query) use ($benef_email) {
            $query->where('email', $benef_email);})->update(['is_viewed' => true]);

    return redirect()->back();
    }//end method

    public function ProjCoordinatorAnnouncement()
    {
        $id = AUTH::user()->id;

       // Get the programId of the user table
       $programId = User::where('id', $id)->pluck('program_id');
       $programEmail = User::where('id', $id)->pluck('email');
       $roleId = User::where('id', $id)->pluck('role_id');
       $roleName = trim(implode(' ', Role::where('id', $roleId)->pluck('role_name')->toArray()));
       // Get the programname of the program table
       $programName = trim(implode(' ', Program::where('id', $programId)->pluck('program_name')->toArray()));
        $status = 'Available';
        $announcement = announcement::where(function ($query) use ($programName, $status) {
             $query->where('from', $programName)->where('status', $status)->orWhere('to', $programName)->where('status', $status);})->get();

        return view('ABAKA_Project_Coordinator.announcement', compact('announcement','programName', 'roleName', 'programEmail'));
    } // End Method

    public function ProjectCoordinatorAnnouncementEdit($id)
    {
        $announcement = announcement::findOrFail($id);

        return view('ABAKA_Project_Coordinator.announcement', compact('announcement'));
    } // End Method

    public function ProjCoordinatorAnnouncementStore(Request $request)
    {
        $userProgramId = AUTH::user()->program->id;
        $to = $request->to;
        if($to !== 'PUBLIC'){
        $abakaBeneficiaries = trim(implode(',', User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->where('blacklisted', false)->pluck('email')->toArray()));
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string',
            'from'=> 'required|string',
            'to' => 'required|string',
            'message' => 'required|string',
        ]);

        $recipientEmail = $abakaBeneficiaries;
        $subject = $validatedData['title'];
        $body = $validatedData['message'];
        $senderName = $validatedData['from'];
        $recipientName = 'ABACA Beneficiaries';
        $time = '';

        // Check if validation passes
        if ($validatedData) 
        {
            // Insert data into the database
            $announcement = announcement::create([
                'title' => $validatedData['title'],
                'from'=> $validatedData['from'],
                'to' => $validatedData['to'],
                'message' => $validatedData['message'],
            ]);
            // Reply to the email message with a body and an attachment
            Mail::to($recipientEmail)->send(new ReplyMailableSchedule($subject, $body, $senderName, $recipientName, $time));
            $announcement->save();

            return redirect()->back()->with('success', 'New Announcement Added!');
        } else {
            return redirect()->back()->with('error', 'Validation failed. Please check your input.');
    }
        }else{
            // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string',
            'from'=> 'required|string',
            'to' => 'required|string',
            'message' => 'required|string',
        ]);

        // Check if validation passes
        if ($validatedData) 
        {
            // Insert data into the database
            $announcement = announcement::create([
                'title' => $validatedData['title'],
                'from'=> $validatedData['from'],
                'to' => $validatedData['to'],
                'message' => $validatedData['message'],
            ]);
            $announcement->save();

            return redirect()->back()->with('success', 'New Announcement Added!');
        } else {
            return redirect()->back()->with('error', 'Validation failed. Please check your input.');
    }

        }
    } // End Method

    public function ProjCoordinatorAnnouncementUpdate(Request $request)
    {
        $userProgramId = AUTH::user()->program->id;
        $aid = $request->announcement_id;

        $to = $request->to;
        if($to !== 'PUBLIC'){
        $programName = trim(implode(' ', Program::where('id', $userProgramId)->pluck('program_name')->toArray()));
        $abakaBeneficiaries = trim(implode(',', User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->where('blacklisted', false)->pluck('email')->toArray()));

        announcement::findOrFail($aid)->update([
            'title'=>$request->title,
            'to'=>$request->to,
            'message'=>$request->message,
        ]);
        $recipientEmail = $abakaBeneficiaries;
        $subject = $request->title;
        $body = $request->message;
        $senderName = $programName;
        $recipientName = $programName . ' Beneficiaries';
        $time = '';
        // Reply to the email message with a body and an attachment
        Mail::to($recipientEmail)->send(new ReplyMailableSchedule($subject, $body, $senderName, $recipientName, $time));
        

        return redirect()->back()->with('success', 'Announcement is Updated!');
        }else{
            announcement::findOrFail($aid)->update([
                'title'=>$request->title,
                'to'=>$request->to,
                'message'=>$request->message,
            ]);
            return redirect()->back()->with('success', 'Announcement is Updated!');
        }
    } // End Method

    public function ProjCoordinatorAnnouncementDelete(Request $request)
    {
        $id = $request->announcement_id;
        // Find the record you want to delete by its primary key
        $recordToDelete = announcement::find($id);

        $status = 'Cancelled';
        // Check if the record exists
        if ($recordToDelete) {
            // Delete the record
            announcement::findOrFail($id)->update([
                'status'=>$status,
            ]);

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
        $id = AUTH::user()->id;

       // Get the programId of the user table
       $programId = User::where('id', $id)->pluck('program_id');
       $roleId = User::where('id', $id)->pluck('role_id');
       $roleName = trim(implode(' ', Role::where('id', $roleId)->pluck('role_name')->toArray()));

       // Get the programname of the program table
       $programName = trim(implode(' ', Program::where('id', $programId)->pluck('program_name')->toArray()));
        $status = 'Available';
        $event = events::where(function ($query) use ($programName, $status) {
            $query->where('from', $programName)->orWhere('to', $programName)->where('status', $status);})->get();

        return view('ABAKA_Project_Coordinator.event', compact('event','programName', 'roleName'));
    } // End Method

    public function ProjectCoordinatorEventEdit($id)
    {
        $event = events::findOrFail($id);

        return view('ABAKA_Project_Coordinator.event', compact('event'));
    } // End Method

public function ProjCoordinatorEventStore(Request $request)
{
    $to = $request->to;
    $userProgramId = AUTH::user()->program->id;
    if($to !== 'PUBLIC'){
    $abakaBeneficiaries = trim(implode(',', User::whereHas('role', function ($query) {
        $query->where('role_name', 'beneficiary');
    })->whereHas('program', function ($query) use ($userProgramId) {
        $query->where('id', $userProgramId);
    })->where('blacklisted', false)->pluck('email')->toArray()));
    // Validate the request
    $validatedData = $request->validate([
        'title' => 'required|string',
        'from'=> 'string',
        'date' => 'required|date',
        'to' => 'required|string',
        'message' => 'required|string',
    ]);
    $recipientEmail = $abakaBeneficiaries;
    $subject = $validatedData['title'];
    $body = $validatedData['message'];
    $senderName = $validatedData['from'];
    $recipientName = 'ABACA Beneficiaries';
    $time = $validatedData['date'];
    // Check if validation passes
    if ($validatedData) {
        // Insert data into the database
        $event = events::create([
            'from' => $validatedData['from'],
            'title' => $validatedData['title'],
            'date' => $validatedData['date'],
            'to' => $validatedData['to'],
            'message' => $validatedData['message'],
        ]);
        // Reply to the email message with a body and an attachment
        Mail::to($recipientEmail)->send(new ReplyMailableSchedule($subject, $body, $senderName, $recipientName, $time));
        $event->save();

        // If the attachment file is not empty, store it in the database

        return redirect()->back()->with('success', 'New Event Added!');
        } else {
            return redirect()->back()->with('error', 'Validation failed. Please check your input.');
        }
        }else{
            // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string',
            'from'=> 'string',
            'date' => 'required|date',
            'to' => 'required|string',
            'message' => 'required|string',
        ]);
        // Check if validation passes
        if ($validatedData) {
            // Insert data into the database
            $event = events::create([
                'from' => $validatedData['from'],
                'title' => $validatedData['title'],
                'date' => $validatedData['date'],
                'to' => $validatedData['to'],
                'message' => $validatedData['message'],
        ]);
        $event->save();

        // If the attachment file is not empty, store it in the database

        return redirect()->back()->with('success', 'New Event Added!');
        } else {
            return redirect()->back()->with('error', 'Validation failed. Please check your input.');
        }

        }
}//End Method
public function ProjCoordinatorEventUpdate(Request $request)
{
        $aid = $request->event_id;
        $userProgramId = AUTH::user()->program->id;
        $to = $request->to;
        if($to !== 'PUBLIC'){
        $programName = trim(implode(' ', Program::where('id', $userProgramId)->pluck('program_name')->toArray()));
        $abakaBeneficiaries = trim(implode(',', User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->where('blacklisted', false)->pluck('email')->toArray()));

        events::findOrFail($aid)->update([
            'title'=>$request->title,
            'date'=>$request->date,
            'to'=>$request->to,
            'message'=>$request->message,
        ]);
        $recipientEmail = $abakaBeneficiaries;
        $subject = $request->title;
        $body = $request->message;
        $senderName = $programName;
        $recipientName = 'ABACA Beneficiaries';
        $time = $request->date;
        // Reply to the email message with a body and an attachment
        Mail::to($recipientEmail)->send(new ReplyMailableSchedule($subject, $body, $senderName, $recipientName, $time));

        return redirect()->back()->with('success', 'Event is Updated!');
        }else{
            events::findOrFail($aid)->update([
                'title'=>$request->title,
                'date'=>$request->date,
                'to'=>$request->to,
                'message'=>$request->message,
            ]);
            return redirect()->back()->with('success', 'Event is Updated!');
        }
} // End Method

    public function ProjCoordinatorEventDelete(Request $request)
    {
        $id = $request->event_id;
        // Find the record you want to delete by its primary key
        $recordToDelete = events::find($id);

        $status = 'Cancelled';
        // Check if the record exists
        if ($recordToDelete) {
            // Delete the record
            events::findOrFail($id)->update([
                'status'=>$status,
            ]);

            // Optionally, you can redirect back to a page or return a response
            return redirect()->back()->with('success', 'Event is Deleted!');
        } else {
            // Record not found
            // You can redirect back with an error message or handle it as needed
            return redirect()->back()->with('error', 'Record Not Found!');
        }
    } // End Method

    public function ProjCoordinatorAddSchedule(Request $request, Notification $notification)
    {
        $benef_id = $request->benef_id;

        $user = User::findOrFail($benef_id);
        // Validate the request
        $validatedData = $request->validate([
            'from'=> 'required|string',
            'recipient_email' => 'required|string',
            'description' => 'required|string',
            'date'=> 'required|date',
            'time' => 'required|string',
        ]);
        $time = $validatedData['time'];
        $ampmTime = date('h:i A', strtotime($time));

        $senderName = $validatedData['from'];

        // Get the email address of the recipient
        $recipientEmail = $validatedData['recipient_email'];

        // Get the name of the recipient
        $recipientName = $request->benef_name;

        // Get the subject of the email
        $subject = $validatedData['description'];

        // Get the body of the email
        $body = 'Your schedule for has been set at ' .  $validatedData['date'];

        $time = $ampmTime;
        // Check if validation passes
        if ($validatedData) {
            // Insert data into the database
            $schedules = Schedule::create([
                'from'=> $validatedData['from'],
                'recipient_email'=> $validatedData['recipient_email'],
                'description'=> $validatedData['description'],
                'time' => $ampmTime,
                'date' => $validatedData['date'],
            ]);
            // Reply to the email message with a body and an attachment
            Mail::to($recipientEmail)->send(new ReplyMailableSchedule($subject, $body, $senderName, $recipientName, $time));
            $schedules->save();
            Notification::send($user, new WebsiteNotifications('Your Schedule is Set at', $request->date, $request->time));

            //send via sms
            // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
            // $client = new \Vonage\Client($basic);

            // $response = $client->sms()->send(
            //     new \Vonage\SMS\Message\SMS($user->phone, "apao", "Your Schedule for monitoring is Set at " . $request->date ." ". $request->time)
            // );

            // $message = $response->current();

            // if ($message->getStatus() == 0) {
            //     toastr()->timeOut(7500)->addSuccess('The Beneficiary schedule has been sent via email and SMS!');
            // } else {
            //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
            // }
    
            // If the attachment file is not empty, store it in the database
    
            return redirect()->back()->with('success', 'New Schedule Added!');
        } else {
            return redirect()->back()->with('error', 'Validation failed. Please check your input.');
        }
    }// End Method//End Method

    public function ProjCoordinatorScheduleUpdate(Request $request)
    {
        $aid = $request->schedule_id;

        $benef_id = $request->benef_id;

        $user = User::findOrFail($benef_id);
        
        $senderName = $request->from;
        $recipientEmail = $request->recipient_email;

        $time = $request->time;
        $ampmTime = date('h:i A', strtotime($time));
        
        Schedule::findOrFail($aid)->update([
            'description'=>$request->description,
            'time'=>$ampmTime,
            'date'=>$request->date,
        ]);
        $subject = 'Your schedule has been updated';
        $body = 'Your new schedule is set at ' . $request->date;

        $recipientName = $request->benef_name;
        // Reply to the email message with a body and an attachment
        Mail::to($recipientEmail)->send(new ReplyMailableSchedule($subject, $body, $senderName, $recipientName, $ampmTime));
        
        Notification::send($user, new WebsiteNotifications('Your Schedule has been Updated', $request->date, $request->time));

        //send via sms
        // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS($user->phone, "apao", "Your Schedule for monitoring has been Updated to " . $request->date ." ". $request->time)
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     toastr()->timeOut(7500)->addSuccess('The Beneficiary schedule has been sent via email and SMS!');
        // } else {
        //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
        // }

        return redirect()->back()->with('success', 'Schedule is Updated!');
    } // End Method

    public function ProjCoordinatorScheduleDelete(Request $request)
    {
        $id = $request->schedule_id;

        $benef_id = $request->benef_id;

        $user = User::findOrFail($benef_id);
        // Find the record you want to delete by its primary key
        $recordToDelete = Schedule::find($id);
        
        $senderName = $request->from;
        $recipientEmail = $request->recipient_email;

        $time = $request->time;
        $ampmTime = date('h:i A', strtotime($time));

        
        $subject = 'Your schedule has been cancelled';
        $body = 'This schedule is no longer available > ' . $request->date;
        $recipientName = $request->benef_name;
        // Reply to the email message with a body and an attachment
        Mail::to($recipientEmail)->send(new ReplyMailableSchedule($subject, $body, $senderName, $recipientName, $ampmTime));

        Notification::send($user, new WebsiteNotifications('Your Schedule for monitoring has been cancelled!', $request->date, $request->time));

        //send via sms
        // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS($user->phone, "apao", "Your Monitoring Schedule has been cancelled!" . $request->date ." ". $request->time)
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     toastr()->timeOut(7500)->addSuccess('The Beneficiary schedule has been sent via email and SMS!');
        // } else {
        //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
        // }
        

        // Check if the record exists
        if ($recordToDelete) {
            // Delete the record
            $recordToDelete->delete();

            // Optionally, you can redirect back to a page or return a response
            return redirect()->back()->with('success', 'Schedule is Deleted!');
        } else {
            // Record not found
            // You can redirect back with an error message or handle it as needed
            return redirect()->back()->with('error', 'Record Not Found!');
        }
    } // End Method

    public function ProjCoordinatorInquiry()
    {
        $id = AUTH::user()->id;

        // Get the programId of the user table
       $programId = User::where('id', $id)->pluck('program_id');
       $roleId = User::where('id', $id)->pluck('role_id');
       $roleName = trim(implode(' ', Role::where('id', $roleId)->pluck('role_name')->toArray()));

       // Get the programname of the program table
       $programName = trim(implode(' ', Program::where('id', $programId)->pluck('program_name')->toArray()));
       $public = "PUBLIC";
        $inquiry = inquiries::where(function ($query) use ($programName, $public) {
            $query->where('to', $programName)->orWhere('to', $public);})->get();
            $userEmail = trim(implode(' ', User::where('id', $id)->pluck('email')->toArray()));
        // Count unread announcements
        $unreadCount = Inquiries::where('is_unread', true)->where('to', $programName)->count();

        return view('ABAKA_Project_Coordinator.inquiry', compact('roleName','programName','inquiry', 'userEmail', 'unreadCount'));
    } // End Method
    public function markAsRead(Request $request)
    {
        $inquiryId = $request->inquiry_id;
        // Assuming you have an Eloquent model named Inquiry
        $inquiry = inquiries::findOrFail($inquiryId);

        // Check if is_unread is true, then update it to false
        if ($inquiry->is_unread) {
            $inquiry->update(['is_unread' => false]);
    }

    // Additional logic if needed

    return redirect()->back();
    }//end method


    public function ProjectCoordinatorInquiryReply(Request $request)
    {
        $validatedData = $request->validate([
            'recipient_email'=> 'string',
            'fullname'=> 'string',
            'subject'=> 'string',
            'body' => 'string',
            ]);

        $senderName = $validatedData['subject'];

        // Get the email address of the recipient
        $recipientEmail = $validatedData['recipient_email'];

        // Get the name of the recipient
        $recipientName = $validatedData['fullname'];

        // Get the subject of the email
        $subject = $validatedData['subject'];

        // Get the body of the email
        $body = $validatedData['body'];

        if($validatedData) {
                // Reply to the email message with a body and an attachment
        Mail::to($recipientEmail)->send(new ReplyMailable($subject, $body, $senderName, $recipientName));

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
        $id = $request->inquiry_id;
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
        })->whereHas('status', function ($query) {
            $query->where('status_name', 'Active');
        })->where('blacklisted', false)->get();


        // $users = User::whereHas('role', function ($query) {
        //     $query->where('role_name', 'beneficiary');
        // })->whereHas('program', function ($query) use ($programId) {
        //     $query->where('id', $programId);
        // })->get();
        $id = AUTH::user()->id;

        // Get the programId of the user table
       $programId = User::where('id', $id)->pluck('program_id');
       $roleId = User::where('id', $id)->pluck('role_id');
       $roleName = trim(implode(' ', Role::where('id', $roleId)->pluck('role_name')->toArray()));

       // Get the programname of the program table
       $programName = trim(implode(' ', Program::where('id', $programId)->pluck('program_name')->toArray()));
       $public = 'Public';
        $userEmail = trim(implode(' ', User::where('id', $id)->pluck('email')->toArray()));
        $project = Projects::where(function ($query) use ($programName, $public) {
            $query->where('recipient', $programName)->orwhere('recipient', $public);})->get();

        $assistanceStatuses = Financialassistancestatus::all();

        $filteredassistanceStatuses = $assistanceStatuses->filter(function ($assistanceStatus) {
            return in_array($assistanceStatus->id, [2, 3, 4, 5, 6]);
        });

        $assistanceUnsettledStatus = Financialassistancestatus::where('financial_assistance_status_name', 'unsettled')->first();

        return view('ABAKA_Project_Coordinator.progress', compact('progress', 'abakaBeneficiariesCount', 'abakaActiveCount', 'abakaInactiveCount', 'abakaBeneficiaries', 'filteredassistanceStatuses', 'totalActiveAndInactiveCount', 'assistanceUnsettledStatus', 'project', 'userEmail', 'programName', 'roleName'));
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

            //send via sms
            // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
            // $client = new \Vonage\Client($basic);

            // $response = $client->sms()->send(
            //     new \Vonage\SMS\Message\SMS($user->phone, "apao", "Your financial assistance status has been changed to " . $user->financialAssistanceStatus->financial_assistance_status_name. " today at " . $user->assistance->updated_at)
            // );

            // $message = $response->current();

            // if ($message->getStatus() == 0) {
            //     toastr()->timeOut(7500)->addSuccess('Notification has been sent via email and SMS!');
            // } else {
            //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
            // }
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

            //send via sms
            // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
            // $client = new \Vonage\Client($basic);

            // $response = $client->sms()->send(
            //     new \Vonage\SMS\Message\SMS($user->phone, "apao", "Your financial assistance status has been REJECTED. \n You may send an inquiry or contact your program Project Coordinator.")
            // );

            // $message = $response->current();

            // if ($message->getStatus() == 0) {
            //     toastr()->timeOut(7500)->addSuccess('Notification has been sent via email and SMS!');
            // } else {
            //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
            // }

        }
        elseif ($request->inputAssistanceUpdate == 5) {
            $financialAssistanceId->update([
                'financialassistancestatus_id' => $request->inputAssistanceUpdate,
            ]);

            Financialassistancehistory::create([
                'transaction_type' => 'financial assistance',
                'user_id' => $userId,
                'financialassistance_id' => $assistanceId,
            ]);

            $financialAssistanceId->user->notify(new FinancialAssistanceStatusUpdated());

            //send via sms
            // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
            // $client = new \Vonage\Client($basic);

            // $response = $client->sms()->send(
            //     new \Vonage\SMS\Message\SMS($financialAssistanceId->user->phone, "apao", "Your financial assistance status has been changed to " . $financialAssistanceId->user->financialAssistanceStatus->financial_assistance_status_name)
            // );

            // $message = $response->current();

            // if ($message->getStatus() == 0) {
            //     toastr()->timeOut(7500)->addSuccess('Notification has been sent via email and SMS!');
            // } else {
            //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
            // }
        }
        else
        {
            $financialAssistanceId->update([
                'financialassistancestatus_id' => $request->inputAssistanceUpdate,
            ]);

            // Send an email notification to the user
            if (in_array($request->inputAssistanceUpdate, [2, 3, 4])) {
                // Use the IDs that correspond to "started", "pending," "approved," and "disbursed" status
                $financialAssistanceId->user->notify(new FinancialAssistanceStatusUpdated());

                //send via sms
                // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
                // $client = new \Vonage\Client($basic);

                // $response = $client->sms()->send(
                //     new \Vonage\SMS\Message\SMS($financialAssistanceId->user->phone, "apao", "Your financial assistance status has been changed to " . $financialAssistanceId->user->financialAssistanceStatus->financial_assistance_status_name)
                // );

                // $message = $response->current();

                // if ($message->getStatus() == 0) {
                //     toastr()->timeOut(7500)->addSuccess('Notification has been sent via email and SMS!');
                // } else {
                //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
                // }
            }
        }

        toastr()->timeOut(10000)->addSuccess('Beneficiary Financial Assistance Status has been updated!');

        return redirect()->route('abakaprojectcoordinator.progress');
    } // End Method

    public function ProjCoordinatorAddProject(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'from' => 'required|string',
            'recipient' => 'required|string',
            'message' => 'required|string',
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
            $projects = Projects::create([
                'title' => $validatedData['title'],
                'from' => $validatedData['from'],
                'recipient'=> $validatedData['recipient'],
                'message'=> $validatedData['message'],
                'attachment' => $validatedData['image'],
            ]);
            $projects->save();
    
            // If the attachment file is not empty, store it in the database
    
            return redirect()->back()->with('success', 'New Project Added!');
        } else {
            return redirect()->back()->with('error', 'Validation failed. Please check your input.');
        }
    } //end method
    public function ProjCoordinatorUpdateProject(Request $request)
{
    $aid = $request->project_id;

    // Validate the request
    $validatedData = $request->validate([
        'title' => 'required|string',
        'from' => 'required|string',
        'recipient' => 'required|string',
        'message' => 'required|string',
        'attachment' => 'image',
    ]);

    // Retrieve the existing project
    $project = Projects::findOrFail($aid);

    if ($request->hasFile('attachment')) {

        // Upload the new image and update the attachment path
        $file = $request->file('attachment');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move('Uploads/Updates/', $filename);
        $validatedData['attachment'] = $filename;
    }

    // Update the project with the updated attachment path and other validated data
    $project->update($validatedData);

    return redirect()->back()->with('success', 'Project Updated!');
    }//end method
    public function ProjCoordinatorDeleteProject(Request $request)
    {
        $id = $request->project_id;
        // Find the record you want to delete by its primary key
        $recordToDelete = Projects::find($id);

        // Check if the record exists
        if ($recordToDelete) {
            // Delete the record
            $recordToDelete->delete();

            // Optionally, you can redirect back to a page or return a response
            return redirect()->back()->with('success', 'Project Deleted!');
        } else {
            // Record not found
            // You can redirect back with an error message or handle it as needed
            return redirect()->back()->with('error', 'Record Not Found!');
        }
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
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userData = User::find($id);

        //Validation
        $request->validate([
            'inputOldPassword' => 'required',
            'inputNewPassword' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->mixedCase()->symbols() ], 
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
        //     toastr()->timeOut(7500)->addSuccess('Notification has been sent via email and SMS!');
        // } else {
        //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
        // }

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
        })->where('blacklisted', false)->get();

        return view('ABAKA_Project_Coordinator.registerView', compact('users', 'roles', 'statuses'));
    } // End Method

    public function ProjCoordinatorRegisterEditUser(Request $request)
    {
        $userId = $request->id;

        $userData = User::findOrFail($userId);
        if (!$userData) {
            return redirect()->back()->withErrors(['User not found']);
        }

        $userData->update([
            'status_id' =>$request->inputStatus,
        ]);

        $userData->save();

        //notify on email
        $userData->notify(new InactiveStatusNotif());

        //send via sms
        // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS($userData->phone, "apao", "Your account for Albay Provincial Agriculture Office has been set to ". $userData->status->status_name . "\n If you're status is INACTIVE, Logging in to the Web Application using your account is forbidden. \n You may contact your program coordinator at the Albay Provincial Agriculture Office or send an Inquiry.")
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     toastr()->timeOut(7500)->addSuccess('Message has been sent via email and SMS!');
        // } else {
        //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
        // }


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
                ->where('program_id', $coordinator->program_id)->where('blacklisted', false)
                ->get();

            // Send emails to beneficiaries
            foreach ($beneficiaries as $beneficiary) {
                // Send email using the FinancialAssistanceStatusUpdate Mailable
                Mail::to($beneficiary->email)->send(new FinancialAssistanceStatusUpdate($description));

                //send via sms
                // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
                // $client = new \Vonage\Client($basic);

                // $response = $client->sms()->send(
                //     new \Vonage\SMS\Message\SMS($beneficiary->phone, "apao", "Financial Assistance Update\n\n" . $description)
                // );

                // $message = $response->current();

                // if ($message->getStatus() == 0) {
                //     toastr()->timeOut(7500)->addSuccess('Message has been sent via email and SMS!');
                // } else {
                //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
                // }
            }

            toastr()->timeOut(10000)->addSuccess('Tracking step notification has been sent to all program beneficiaries successfully!');

            return response()->json(['message' => 'Notification sent successfully']);
        } catch (\Exception $e) {
        return response()->json(['error' => 'Error sending notification: ' . $e->getMessage()], 500);
        }
    }

    public function markInquiryAsRead(Inquiries $inquiry)
    {
        \Log::info('Inquiry ID: ' . $inquiry->id); // Log the ID

        try {
            $inquiry->update(['is_read' => true]);
            return response()->json(['message' => 'Message marked as read']);
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error marking message as read: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    public function CoordinatorBlacklistView()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the authenticated user's id
        $programId = AUTH::user()->program_id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        $users = User::orderBy('id', 'asc')->whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($programId) {
            $query->where('id', $programId);
        })->where('blacklisted', true)->get();

        return view('ABAKA_Project_Coordinator.blacklisted', compact('userProfileData', 'users'));
    } // End Method

    public function CoordinatorBlacklistUser(Request $request, $id)
    {
        $userId = User::findOrFail($id);

        if ($userId->assistance) {
            $asstId = $userId->assistance->id;

            $userAsstId = Financialassistance::findOrFail($asstId);

            $userAsstId->delete();

            $userId->update([
                'blacklisted' => true,
                'blacklist_remarks' => $request->remarks,
            ]);

        }
        else {
            $userId->update([
                'blacklisted' => true,
                'blacklist_remarks' => $request->remarks,
            ]);
        }

        //notify via email
        $userId->notify(new BlacklistNotification());

        //send via sms
        // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS($userId->phone, "apao", "Your account for Albay Provincial Agriculture Office has been Blacklisted, please contact your Program Project Coordinator for inquiries.")
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     toastr()->timeOut(7500)->addSuccess('Notification has been sent via email and SMS!');
        // } else {
        //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
        // }

        toastr()->timeOut(10000)->addSuccess('User has been Blacklisted!');

        return redirect()->back();
    } // End Method

    public function CoordinatorRestoreUser($id)
    {
        $userId = User::findOrFail($id);

        $userId->update([
            'blacklisted' => false,
            'blacklist_remarks' => null,
        ]);

        //notify via email
        $userId->notify(new RestoreNotification());

        //send via sms
        // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS($userId->phone, "apao", "Your account for Albay Provincial Agriculture Office has been Restored, you may login again!")
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     toastr()->timeOut(7500)->addSuccess('Notification has been sent via email and SMS!');
        // } else {
        //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
        // }

        toastr()->timeOut(10000)->addSuccess('User has been Restored!');

        return redirect()->back();
    } // End Method
}


    

    



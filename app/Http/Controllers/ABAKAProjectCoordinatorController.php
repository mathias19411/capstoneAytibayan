<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Program;
use App\Models\Status;
use App\Models\announcement;
use App\Models\inquiries;
use App\Models\progress;
use App\Models\events;
use App\Models\Financialassistance;
use App\Models\Financialassistancestatus;

class ABAKAProjectCoordinatorController extends Controller
{
    public function ProjectCoordinatorHome()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        return view('ABAKA_Project_Coordinator.beneficiary', compact('userProfileData'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'message' => 'required|string',
        ]);

        // Check if validation passes
        if ($validatedData) 
        {
            // Insert data into the database
            events::insert([
                'title' => $validatedData['title'],
                'date' => $validatedData['date'],
                'image' => $validatedData['image'],
                'to' => $validatedData['to'],
                'message' => $validatedData['message'],
            ]);

            return redirect()->back()->with('success', 'New Event Added!');
        } else {
            return redirect()->back()->with('error', 'Validation failed. Please check your input.');
    }
    } // End Method

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
        $inquiry = inquiries::all();

        return view('ABAKA_Project_Coordinator.inquiry', ['progress'=>$inquiry]);
    } // End Method
    
    public function ProjCoordinatorProgress()
    {
        $progress = progress::all();

        //total benef count
        $abakaBeneficiariesCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) {
            $query->where('program_name', 'abakamopisomo');
        })->count();

        //total active benef
        $abakaActiveCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) {
            $query->where('program_name', 'abakamopisomo');
        })->whereHas('status', function ($query) {
            $query->where('status_name', 'Active');
        })->count();

        //total inactive benef
        $abakaInactiveCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) {
            $query->where('program_name', 'abakamopisomo');
        })->whereHas('status', function ($query) {
            $query->where('status_name', 'Inactive');
        })->count();

        $abakaBeneficiaries = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) {
            $query->where('program_name', 'abakamopisomo');
        })->get();

        $assistanceStatuses = Financialassistancestatus::all();

        return view('ABAKA_Project_Coordinator.progress', compact('progress', 'abakaBeneficiariesCount', 'abakaActiveCount', 'abakaInactiveCount', 'abakaBeneficiaries', 'assistanceStatuses'));
    } // End Method

    public function ProjCoordinatorProgressAdd(Request $request)
    {
        $userId = $request->userId;

        // Validate form inputs
        $validatedData = $request->validate([
            'project' => ['required', 'string', 'max:70'],
            'amount' => ['required', 'numeric'],
        ]);

        if ($validatedData)
        {
            Financialassistance::create([
                'user_id' => $userId,
                'project' => $validatedData['project'],
                'amount' => $validatedData['amount'],
                'financialassistancestatus_id' => 2,
            ]);
        }

        toastr()->timeOut(10000)->addSuccess('A new Beneficiary Project has been added!');

        return redirect()->route('abakaprojectcoordinator.progress');
    } // End Method

    public function ProjCoordinatorProgressUpdate(Request $request)
    {
        $assistanceId = $request->assistanceId;

        $financialAssistanceId = Financialassistance::findOrFail($assistanceId);

        if ($request->inputAssistanceUpdate == 5) {
            // Status is "rejected," delete the associated row
            $financialAssistanceId->delete();
        }
        else
        {
            $financialAssistanceId->update([
                'financialassistancestatus_id' => $request->inputAssistanceUpdate,
            ]);
        }

        toastr()->timeOut(10000)->addSuccess('Beneficiary Financial Assistance Status has been updated!');

        return redirect()->route('abakaprojectcoordinator.progress');
    } // End Method
}

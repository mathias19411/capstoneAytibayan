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

class LEADProjectCoordinatorController extends Controller
{
    public function ProjectCoordinatorHome()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        return view('LEAD_Project_Coordinator.beneficiary', compact('userProfileData'));
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
        $binhi = "LEAD";
        $public = "PUBLIC";
        $announcement = announcement::where(function ($query) use ($binhi, $public) {
            $query->where('to', $binhi)->orWhere('to', $public);})->get();

        return view('LEAD_Project_Coordinator.announcement', ['announcement'=>$announcement]);
    } // End Method

    public function ProjectCoordinatorAnnouncementEdit($id)
    {
        $announcement = announcement::findOrFail($id);

        return view('LEAD_Project_Coordinator.announcement', compact('announcement'));
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
        $binhi = "LEAD";
        $public = "PUBLIC";
        $event = events::where(function ($query) use ($binhi, $public) {
            $query->where('to', $binhi)->orWhere('to', $public);})->get();

        return view('LEAD_Project_Coordinator.event', ['event'=>$event]);
    } // End Method

    public function ProjectCoordinatorEventEdit($id)
    {
        $event = events::findOrFail($id);

        return view('LEAD_Project_Coordinator.event', compact('event'));
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

        return view('LEAD_Project_Coordinator.inquiry', ['progress'=>$inquiry]);
    } // End Method
    public function ProjCoordinatorProgress()
    {
        $progress = progress::all();

        return view('LEAD_Project_Coordinator.progress', ['progress'=>$progress]);
    } // End Method
}

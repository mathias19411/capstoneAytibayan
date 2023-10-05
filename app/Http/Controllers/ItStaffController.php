<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\announcement;
use App\Models\events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class ItStaffController extends Controller
{
    public function ItStaffHome()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        // Get the total number of users
        $totalUsers = User::count();

        // Get the number of users with the role "project_coordinator"
        $totalcoordinators = User::whereHas('role', function ($query) {
            $query->whereIn('role_name', ['projectcoordinator']);
        })->count();

        // Get the number of users with the role "beneficiary"
        $totalbeneficiaries = User::whereHas('role', function ($query) {
            $query->whereIn('role_name', ['beneficiary']);
        })->count();

        // Get the number of users that are active
        $activeBeneficiaries = User::whereHas('role', function ($query) {
            $query->whereIn('role_name', ['beneficiary']);
        })->whereHas('status', function ($query) {
            $query->whereIn('status_name', ['Active']);
        })->count();

        // Get the number of users that are inactive
        $inactiveBeneficiaries = User::whereHas('role', function ($query) {
            $query->whereIn('role_name', ['beneficiary']);
        })->whereHas('status', function ($query) {
            $query->whereIn('status_name', ['Inactive']);
        })->count();

        $coordinators = User::whereHas('role', function ($query) {
            $query->where('role_name', 'projectcoordinator');
        })
        ->with('program')
        ->get();
        
        $userCountsByProgram = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->with(['program', 'status'])->get()->groupBy('program.program_name');


        return view('ITStaff.home', compact('userProfileData', 'totalUsers', 'totalcoordinators', 'totalbeneficiaries', 'activeBeneficiaries', 'inactiveBeneficiaries', 'coordinators', 'userCountsByProgram'));
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

    public function ItStaffAddProgramView()
    {
        return view('ITStaff.addprogram');
    } // End Method

    public function ItStaffAddNewProgram(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'first_name' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'last_name' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'phone_number' => ['required', 'string', 'max:11'],
            // 'inputRole' => ['required', Rule::in(Role::pluck('id')->all())],
            // 'inputProgram' => ['required', Rule::in(Program::pluck('id')->all())],
            'primaryAddress' => ['required', 'string', 'max:255'],
            'inputCity' => ['required', 'string', 'max:255'],
            'inputProvince' => ['required', 'string', 'max:255'],
            'inputZip' => ['required', 'string', 'max:255'],
            // 'inputStatus' => ['required', Rule::in(Status::pluck('id')->all())],
            
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone_number,
            'primary_address' => $request->primaryAddress,
            'city' => $request->inputCity,
            'province' => $request->inputProvince,
            'zip' => $request->inputZip,
            'role_id' => $request->inputRole,
            'program_id' => $request->inputProgram,
            'status_id' => $request->inputStatus
            // 'password' => Hash::make($request->password),
        ]);

        $user->save();
        // event(new Registered($user));

        // Auth::login($user);

        toastr()->timeOut(10000)->addSuccess('A new Program has been successfully added!');

        return redirect()->route('itstaff.home');
    } // End Method

    public function ItStaffEditProgram()
    {
        return view('ITStaff.edit_program');
    } // End Method

    public function ITStaffAnnouncement()
    {
        $announcement = announcement::all();

        return view('ITStaff.announcement', ['announcement'=>$announcement]);
    } // End Method

    public function ITStaffAnnouncementEdit($id)
    {
        $announcement = announcement::findOrFail($id);

        return view('ITStaff.announcement', compact('announcement'));
    } // End Method

    public function ITStaffAnnouncementStore(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'to' => 'required|string',
            'message' => 'required|string',
        ]);

        // Check if validation passes
        if ($validatedData) 
        {
            // Insert data into the database
            announcement::insert([
                'title' => $validatedData['title'],
                'to' => $validatedData['to'],
                'message' => $validatedData['message'],
            ]);

            return redirect()->back()->with('success', 'New Announcement Added!');
        } else {
            return redirect()->back()->with('error', 'Validation failed. Please check your input.');
    }
    } // End Method

    public function ITStaffAnnouncementUpdate(Request $request)
    {
        $aid = $request->announcement_id;
        
        announcement::findOrFail($aid)->update([
            'title'=>$request->title,
            'to'=>$request->to,
            'message'=>$request->message,
        ]);

        return redirect()->back()->with('success', 'Announcement is Updated!');
    } // End Method

    public function ITStaffAnnouncementDelete(Request $request)
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
    }
    
    public function ITStaffEvent()
    {
        $event = events::all();

        return view('ITStaff.event', ['event'=>$event]);
    } // End Method

    public function ITStaffEventEdit($id)
    {
        $events = events::findOrFail($id);

        return view('ITStaff.event', compact('events'));
    } // End Method

    
    public function ITStaffEventStore(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example: Allow JPEG, PNG, and GIF images, max 2MB
            'date' => 'required|date',
        ]);

        // Check if validation passes
        if ($validatedData) 
        {
            // Insert data into the database
            events::insert([
                'title' => $validatedData['title'],
                'message' => $validatedData['message'],
                'image' => $validatedData['image'],
                'date' => $validatedData['date'],
            ]);

            return redirect()->back()->with('success', 'New Event Added!');
        } else {
            return redirect()->back()->with('error', 'Validation failed. Please check your input.');
    }

    } // End Method

    public function ITStaffEventUpdate(Request $request)
    {
        $aid = $request->event_id;
        
        events::findOrFail($aid)->update([
            'title' => $request->title,
            'date' =>$request->date,
            'message' => $request->message,
            'image' => $request->image,
        ]);

        return redirect()->back()->with('success', 'Event is Updated!');
    } // End Method

    public function ITStaffEventDelete(Request $request)
    {
        $id = $request->delete_id;
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
    }

    public function ITStaffRegisterView()
    {
        $users = User::orderBy('id', 'asc')->get();

        return view('ITStaff.registerView', compact("users"));
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

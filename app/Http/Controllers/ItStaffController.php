<?php

namespace App\Http\Controllers;

use App\Models\announcement;
use App\Models\events;
use App\Models\Program;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;


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

        $totalActiveandInactiveBeneficiaries = [$activeBeneficiaries, $inactiveBeneficiaries];

        $coordinators = User::whereHas('role', function ($query) {
            $query->where('role_name', 'projectcoordinator');
        })
        ->with('program')
        ->get();
        
        // $userCountsByProgram = User::whereHas('role', function ($query) {
        //     $query->where('role_name', 'beneficiary');
        // })->with(['program', 'status'])->get();

        $programs = Program::with(['user' => function ($query) {
            $query->whereHas('role', function ($subQuery) {
                $subQuery->where('role_name', 'beneficiary');
            });
        }])->get();

        $programCharts = Program::with(['user' => function ($query) {
            $query->whereHas('role', function ($query) {
                $query->where('role_name', 'beneficiary');
            });
        }])->get();

        $programNames = $programCharts->pluck('program_name')->toArray();
        $beneficiaryCounts = $programCharts->map(function ($program) {
            return (int)count($program->user);
        })->toArray();

        $dataLineChart = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->selectRaw('DATE_FORMAT(created_at, "%M") as month, COUNT(*) as count')
        ->groupBy('month')
        ->get();

        $months = [];
        $monthCount = [];

        foreach ($dataLineChart as $entry) {
            $months[] = $entry->month;
            $monthCount[] = $entry->count;
        }
        

        return view('ITStaff.home', compact('userProfileData', 'totalUsers', 'totalcoordinators', 'totalbeneficiaries', 'totalActiveandInactiveBeneficiaries', 'coordinators', 'programs', 'programNames', 'beneficiaryCounts', 'dataLineChart', 'months', 'monthCount'));
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
        // Get the number of project coordiantors
        $coordinators = User::whereHas('role', function ($query) {
            $query->whereIn('role_name', ['projectcoordinator']);
        })->get();

        return view('ITStaff.addprogram', compact('coordinators'));
    } // End Method

    public function ItStaffAddNewProgram(Request $request)
    {
        // Validate form inputs
        $validatedData = $request->validate([
            'programnameInput' => ['required', 'string', 'max:30', 'unique:programs,program_name'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'inputLocation' => ['required', 'string', 'max:50'],
            'inputEmail' => ['required', 'string', 'email', 'max:255', 'unique:programs,email'],
            'inputContact' => ['required', 'string', 'max:12'],
            'inputInfo' => ['required', 'string', 'max:500'],
            'inputApply' => ['required', 'string', 'max:500'],
            'inputReqs' => ['required', 'string', 'max:500'],
            'programPhoto' => ['required' , 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'programBackgroundPhoto' => ['required' , 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($request->file('programPhoto'))
        {
            // $imagePath = $request->file('programPhoto')->store('public/Uploads/Program_images');
            
            // // Remove the 'public/' prefix from the path to store in the database
            // $validatedData['programPhoto'] = str_replace('public/', '', $imagePath);

            $file = $request->file('programPhoto');

            @unlink(public_path('Uploads/Program_images/'.$validatedData['programPhoto']));

            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('Uploads/Program_images'),$fileName);
            $validatedData['programPhoto'] = $fileName;
        }

        if ($request->file('programBackgroundPhoto'))
        {
            // $imagePath = $request->file('programPhoto')->store('public/Uploads/Program_images');
            
            // // Remove the 'public/' prefix from the path to store in the database
            // $validatedData['programPhoto'] = str_replace('public/', '', $imagePath);

            $file = $request->file('programBackgroundPhoto');

            @unlink(public_path('Uploads/Program_images/'.$validatedData['programBackgroundPhoto']));

            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('Uploads/Program_images'),$fileName);
            $validatedData['programBackgroundPhoto'] = $fileName;
        }


        if ($validatedData)
        {
            $hashed = Hash::make($validatedData['password']);
            
            // dd($hashed);

            Program::create([
                'program_name' => $validatedData['programnameInput'],
                'location' => $validatedData['inputLocation'],
                'email' => $validatedData['inputEmail'],
                'contact' => $validatedData['inputContact'],
                'description' => $validatedData['inputInfo'],
                'quiry' => $validatedData['inputApply'],
                'requirements' => $validatedData['inputReqs'],
                'image' => $validatedData['programPhoto'],
                'background_image' => $validatedData['programBackgroundPhoto'],
                'password' => $hashed,
            ]);

            toastr()->timeOut(10000)->addSuccess('A new Program has been successfully added!');

            return redirect()->route('itstaff.home');
        }
        else
        {
            toastr()->timeOut(10000)->addError('Validation failed. Please check your inputs and try again!');

            return redirect()->back();
        }
        // event(new Registered($user));

        // Auth::login($user);
    } // End Method

    public function ItStaffEditProgramView($id)
    {
        //get all coordinators associated with a specific program
        $program = Program::with('coordinators')->findOrFail($id);

        $userProgramId = $id;

        $users = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->get();

        // dd($program->coordinators);

        return view('ITStaff.edit_program', compact('program', 'users'));
    } // End Method

    public function ItStaffUpdateProgram(Request $request)
    {
        $programId = $request->id;

        $programData = Program::findOrFail($programId);

        $validatedData = $request->validate([
            'programnameInput' => ['string', 'max:30'],
            'password' => ['confirmed', Rules\Password::defaults()],
            'inputLocation' => ['string', 'max:50'],
            'inputEmail' => ['string', 'email', 'max:255'],
            'inputContact' => ['string', 'max:12'],
            'inputInfo' => ['string', 'max:500'],
            'inputApply' => ['string', 'max:500'],
            'inputReqs' => ['string', 'max:500'],
            // 'programPhoto' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($validatedData)
        {
            $hashed = Hash::make($validatedData['password']);
            
            // dd($hashed);

            $programData->update([
                'program_name' => $validatedData['programnameInput'],
                'location' => $validatedData['inputLocation'],
                'email' => $validatedData['inputEmail'],
                'contact' => $validatedData['inputContact'],
                'description' => $validatedData['inputInfo'],
                'quiry' => $validatedData['inputApply'],
                'requirements' => $validatedData['inputReqs'],
                'password' => $hashed,
            ]);

            if ($request->file('programPhoto'))
            {
                $file = $request->file('programPhoto');

                @unlink(public_path('Uploads/Program_images/'.$programData->image));

                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('Uploads/Program_images'),$fileName);
                $programData['image'] = $fileName;
            }

            if ($request->file('programBackgroundPhoto'))
            {
                $file = $request->file('programBackgroundPhoto');

                @unlink(public_path('Uploads/Program_images/'.$programData->background_image));

                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('Uploads/Program_images'),$fileName);
                $programData['background_image'] = $fileName;
            }
            $programData->save();

            toastr()->timeOut(10000)->addSuccess('Program has been updated successfully!');
            
            return redirect()->route('itstaff.home');
        }
        else
        {
            toastr()->timeOut(10000)->addError('Validation failed. Please check your inputs and try again!');

            return redirect()->back();
        }
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
            'to' => 'required|string',
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
                'to' => $validatedData['to'],
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
        $roles = Role::all();
        $statuses = Status::all();

        return view('ITStaff.registerView', compact('users', 'roles', 'statuses'));
    } // End Method

    public function ITStaffRegisterEditUser(Request $request)
    {
        $userId = $request->id;

        $userData = User::findOrFail($userId);

        $userData->update([
            'role_id' => $request->inputRole,
            'status_id' =>$request->inputStatus,
        ]);

        $userData->save();

        toastr()->timeOut(10000)->addSuccess('User data has been updated successfully!');
        
        return redirect()->back();
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

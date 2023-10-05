<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return view('ITStaff.announcement');
    } // End Method
    
    public function ITStaffEvent()
    {
        return view('ITStaff.event');
    } // End Method

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

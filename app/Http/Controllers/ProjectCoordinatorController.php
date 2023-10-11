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

class ProjectCoordinatorController extends Controller
{
    public function ProjectCoordinatorHome()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        return view('Project_Coordinator.beneficiary', compact('userProfileData'));
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
        $announcement = announcement::all();

        return view('Project_Coordinator.announcement', ['announcement'=>$announcement]);
    } // End Method

    public function ProjCoordinatorEvent()
    {
        $event = events::all();

        return view('Project_Coordinator.event', ['event'=>$event]);
    } // End Method
    public function ProjCoordinatorInquiry()
    {
        $inquiry = inquiries::all();

        return view('Project_Coordinator.inquiry', ['progress'=>$inquiry]);
    } // End Method
    public function ProjCoordinatorProgress()
    {
        $progress = progress::all();

        return view('Project_Coordinator.progress', ['progress'=>$progress]);
    } // End Method
}

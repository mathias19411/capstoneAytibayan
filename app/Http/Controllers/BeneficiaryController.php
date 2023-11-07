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


class BeneficiaryController extends Controller
{
    public function BeneficiaryHome()
    {
        return view('Beneficiary.home');
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
        return view('Beneficiary.inquiry');
    } // End Method
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Notifications\TwoFactorCode;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class TwoFactorController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth', 'twofactor']);
    }

    public function index() 
    {
        /** @var \App\Models\User $user **/
        //Access the authenticated user's id
        $user = AUTH::user();

        $user->generateTwoFactorCode();
        $user->notify(new TwoFactorCode());

        return view('auth.twoFactor');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'two_factor_code' => 'integer|required',
        ]);

        $user = auth()->user();

        $url = '';

        if($request->input('two_factor_code') == $user->two_factor_code)
        {
            /** @var \App\Models\User $user **/
        // It'd tell PHP intelephense that $user variable is not Illuminate\Foundation\Auth\User but \App\Models\User
            $user->resetTwoFactorCode();

            $firstName = auth()->user()->first_name;
            $middleName = auth()->user()->middle_name;
            $lastName = auth()->user()->last_name;
            // Condition to check for user roles
            if($user->role->role_name === 'itstaff')
            {
                $url = '/ITStaff/home';
            }
            else if ($user->role->role_name === 'projectcoordinator')
            {
                $url = '/ProjectCoordinator/home';
            }
            else if ($user->role->role_name === 'abakaprojectcoordinator')
            {
                $url = '/ABAKA_ProjectCoordinator/home';
            }
            else if ($user->role->role_name === 'agripinayprojectcoordinator')
            {
                $url = '/AGRIPINAY_ProjectCoordinator/home';
            }
            else if ($user->role->role_name === 'akbayprojectcoordinator')
            {
                $url = '/AKBAY_ProjectCoordinator/home';
            }
            else if ($user->role->role_name === 'leadprojectcoordinator')
            {
                $url = '/LEAD_ProjectCoordinator/home';
            }
            else if ($user->role->role_name === 'beneficiary')
            {
                $url = '/Beneficiary/home';
            }

            toastr()->timeOut(7500)->addInfo('Welcome back ' . $firstName . ' ' . $middleName . ' ' . $lastName . '!');

            return redirect()->intended($url);
        }

        return redirect()->back()->withErrors(['two_factor_code' => 'The two factor code you have entered does not match']);
    }

    public function resend()
    {
        /** @var \App\Models\User $user **/
        // It'd tell PHP intelephense that $user variable is not Illuminate\Foundation\Auth\User but \App\Models\User
        $user = auth()->user();
        $user->generateTwoFactorCode();
        $user->notify(new TwoFactorCode());

        toastr()->timeOut(10000)->addInfo('The two factor code has been sent again');

        return redirect()->back();
    }
}
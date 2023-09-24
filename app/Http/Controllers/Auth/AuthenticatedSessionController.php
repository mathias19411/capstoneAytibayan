<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $url = '';
        //  //Access the authenticated user's id
        // $id = AUTH::user()->id;

        // //Access the specific row data of the user's id
        // $userProfileData = User::find($id);

        // Access the authenticated user
        $user = $request->user();

        // Access the role name using the defined relationship
        $roleName = $user->role->role_name; 

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
        else if ($user->role->role_name === 'beneficiary')
        {
            $url = '/Beneficiary/home';
        }

        toastr()->timeOut(7500)->addInfo('Welcome back ' . $firstName . ' ' . $middleName . ' ' . $lastName . '!');

        return redirect()->intended($url);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

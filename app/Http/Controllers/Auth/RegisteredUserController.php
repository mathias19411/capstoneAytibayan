<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate form inputs
        $request->validate([
            'first_name' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'last_name' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'phone_number' => ['required', 'string', 'max:11'],
            'inputRole' => ['required', 'in:itstaff,project_coordinator,beneficiary'],
            'primaryAddress' => ['required', 'string', 'max:255'],
            'inputCity' => ['required', 'string', 'max:255'],
            'inputProvince' => ['required', 'string', 'max:255'],
            'inputZip' => ['required', 'string', 'max:255'],
            
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
            'role' => $request->inputRole,
            // 'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);

        toastr()->timeOut(10000)->addSuccess('A new User has been successfully registered!');

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Program;
use App\Models\Role;
use App\Models\Status;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use App\Events\UserEvent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        $programs = Program::all();
        $roles = Role::all();
        $statuses = Status::all();
        return view('auth.register', compact('programs', 'roles', 'statuses'));
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
            'inputRole' => ['required', Rule::in(Role::pluck('id')->all())],
            'inputProgram' => ['required', Rule::in(Program::pluck('id')->all())],
            'primaryAddress' => ['required', 'string', 'max:255'],
            'inputCity' => ['required', 'string', 'max:255'],
            'inputProvince' => ['required', 'string', 'max:255'],
            'inputZip' => ['required', 'string', 'max:255'],
            'inputStatus' => ['required', Rule::in(Status::pluck('id')->all())],
            
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
        
        // event(new UserEvent($user));


        // Auth::login($user);

        toastr()->timeOut(10000)->addSuccess('A new User has been successfully registered!');

        return redirect()->route('itstaff.registerView');
    }
}

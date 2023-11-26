<?php

namespace App\Http\Controllers;

use App\Mail\FinancialAssistanceStatusUpdate;
use App\Mail\LoanStatusUpdate;
use App\Mail\ReplyMailable;
use App\Models\announcement;
use App\Models\Assistancesteps;
use App\Models\Currentloanstatus;
use App\Models\events;
use App\Models\File;
use App\Models\Financialassistance;
use App\Models\Financialassistancestatus;
use App\Models\inquiries;
use App\Models\Loan;
use App\Models\Loanhistory;
use App\Models\Loanstatus;
use App\Models\Program;
use App\Models\progress;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use App\Notifications\AccountUpdateNotif;
use App\Notifications\BlacklistNotification;
use App\Notifications\CurrentLoanUpdate;
use App\Notifications\FinancialAssistanceStatusRejected;
use App\Notifications\FinancialAssistanceStatusUpdated;
use App\Notifications\InactiveStatusNotif;
use App\Notifications\LoanRejected;
use App\Notifications\LoanRepaymentNotif;
use App\Notifications\LoanStatusUpdated;
use App\Notifications\PasswordUpdateNotif;
use App\Notifications\RepaymentSchedule;
use App\Notifications\RestoreNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class AGRIPINAYProjectCoordinatorController extends Controller
{
    public function ProjectCoordinatorHome()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        $userRole = AUTH::user()->role->role_name;

        $userProgramId = AUTH::user()->program->id;

        $agripinayBeneficiaries = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->where('blacklisted', false)->get();

        //total benef count
        $agripinayBeneficiariesCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->count();

        //total active benef
        $agripinayActiveCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->whereHas('status', function ($query) {
            $query->where('status_name', 'Active');
        })->count();

        //total inactive benef
        $agripinayInactiveCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->whereHas('status', function ($query) {
            $query->where('status_name', 'Inactive');
        })->count();

        return view('AGRIPINAY_Project_Coordinator.beneficiary', compact('userProfileData', 'agripinayBeneficiaries', 'agripinayBeneficiariesCount', 'agripinayActiveCount', 'agripinayInactiveCount'));
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
        $binhi = "AGRIPINAY";
        $public = "PUBLIC";
        $announcement = announcement::where(function ($query) use ($binhi, $public) {
            $query->where('to', $binhi)->orWhere('to', $public);})->get();

        return view('AGRIPINAY_Project_Coordinator.announcement', ['announcement'=>$announcement]);
    } // End Method

    public function ProjectCoordinatorAnnouncementEdit($id)
    {
        $announcement = announcement::findOrFail($id);

        return view('AGRIPINAY_Project_Coordinator.announcement', compact('announcement'));
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
        $binhi = "AGRIPINAY";
        $public = "PUBLIC";
        $event = events::where(function ($query) use ($binhi, $public) {
            $query->where('to', $binhi)->orWhere('to', $public);})->get();

        return view('AGRIPINAY_Project_Coordinator.event', ['event'=>$event]);
    } // End Method

    public function ProjectCoordinatorEventEdit($id)
    {
        $event = events::findOrFail($id);

        return view('AGRIPINAY_Project_Coordinator.event', compact('event'));
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

        return view('AGRIPINAY_Project_Coordinator.inquiry', ['progress'=>$inquiry]);
    } // End Method
    public function ProjCoordinatorProgress()
    {
        $progress = progress::all();

        $userRole = AUTH::user()->role->role_name;

        $userProgramId = AUTH::user()->program->id;

        //total benef count
        $agripinayBeneficiariesCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->count();

        //total active benef
        $agripinayActiveCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->whereHas('status', function ($query) {
            $query->where('status_name', 'Active');
        })->count();

        //total inactive benef
        $agripinayInactiveCount = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->whereHas('status', function ($query) {
            $query->where('status_name', 'Inactive');
        })->count();

        $totalActiveAndInactiveCount = [$agripinayActiveCount, $agripinayInactiveCount];

        $agripinayBeneficiaries = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($userProgramId) {
            $query->where('id', $userProgramId);
        })->whereHas('status', function ($query) {
            $query->where('status_name', 'Active');
        })->where('blacklisted', false)->get();


        // $users = User::whereHas('role', function ($query) {
        //     $query->where('role_name', 'beneficiary');
        // })->whereHas('program', function ($query) use ($programId) {
        //     $query->where('id', $programId);
        // })->get();

        $loanStatuses = Loanstatus::all();

        $filteredLoanStatuses = $loanStatuses->filter(function ($loanStatus) {
            return in_array($loanStatus->id, [2, 3, 4, 5, 6]);
        });

        $currentLoanStatuses = Currentloanstatus::all();

        $filteredCurrentLoanStatuses = $currentLoanStatuses->filter(function ($currentLoanStatus) {
            return in_array($currentLoanStatus->id, [1, 2, 4]);
        });

        $loanUnsettledStatus = Loanstatus::where('loan_status_name', 'unsettled')->first();

        foreach ($agripinayBeneficiaries as $agripinayBeneficiary) {
            if ($agripinayBeneficiary->loan) {
                // Find loans where the repayment schedule is in the past
                $overdueLoans = Loan::whereDate('repayment_schedule', '<', now())
                ->where('currentloanstatus_id', '!=', 4)
                ->get();
    
                foreach ($overdueLoans as $overdueLoan) {
                    // Update the currentloanstatus to "overdue"
                    $overdueLoan->update(['currentloanstatus_id' => 4]);
                    $overdueLoan->save();
                }
                
            }
        }
        
        

        return view('AGRIPINAY_Project_Coordinator.progress', compact('progress', 'agripinayBeneficiariesCount', 'agripinayActiveCount', 'agripinayInactiveCount', 'agripinayBeneficiaries', 'filteredLoanStatuses', 'filteredCurrentLoanStatuses', 'totalActiveAndInactiveCount', 'loanUnsettledStatus'));

    } // End Method

    public function ProjCoordinatorProgressAdd(Request $request)
    {
        $userId = $request->userId;

        // Validate form inputs
        $validatedData = $request->validate([
            'project' => ['required', 'string', 'max:70'],
            'amount' => ['required', 'numeric'],
            'term' => ['required', 'numeric'],
            'repaymentSched' => ['required', 'date'],
            'maturity' => ['required', 'date'],
        ]);

        if ($validatedData)
        {
            Loan::create([
                'user_id' => $userId,
                'project' => $validatedData['project'],
                'loan_amount' => $validatedData['amount'],
                'loan_term_in_months' => $validatedData['term'],
                'repayment_schedule' => $validatedData['repaymentSched'],
                'date_of_maturity' => $validatedData['maturity'],
                'remaining_loan_balance' => $validatedData['amount'],
                'loanstatus_id' => 2,
                'currentloanstatus_id' => 1,
            ]);

            /** @var \App\Models\User $user **/
            //Access the authenticated user's id
            $user = User::findOrFail($userId);

            $user->notify(new LoanStatusUpdated());

            //send via sms
            // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
            // $client = new \Vonage\Client($basic);

            // $response = $client->sms()->send(
            //     new \Vonage\SMS\Message\SMS($user->phone, "apao", "Your financial assistance status has been changed to " . $user->financialAssistanceStatus->financial_assistance_status_name. " today at " . $user->assistance->updated_at)
            // );

            // $message = $response->current();

            // if ($message->getStatus() == 0) {
            //     toastr()->timeOut(7500)->addSuccess('The user\'s credentials has been sent via email and SMS!');
            // } else {
            //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
            // }
        }


        toastr()->timeOut(10000)->addSuccess('A new Beneficiary Project has been added!');

        return redirect()->route('agripinayprojectcoordinator.progress');
    } // End Method

    public function ProjCoordinatorProgressUpdate(Request $request)
    {
        $loanId = $request->loanId;

        $userId = $request->userId;

        $userLoanId = Loan::findOrFail($loanId);

        /** @var \App\Models\User $user **/
            //Access the authenticated user's id
            $user = User::findOrFail($userId);

        if ($request->inputLoanUpdate == 6) {

            $userLoanId->delete();

            $user->notify(new LoanRejected());
            // Status is "rejected," delete the associated row

            //send via sms
            // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
            // $client = new \Vonage\Client($basic);

            // $response = $client->sms()->send(
            //     new \Vonage\SMS\Message\SMS($user->phone, "apao", "Your financial assistance status has been REJECTED. \n You may send an inquiry or contact your program Project Coordinator.")
            // );

            // $message = $response->current();

            // if ($message->getStatus() == 0) {
            //     toastr()->timeOut(7500)->addSuccess('The user\'s credentials has been sent via email and SMS!');
            // } else {
            //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
            // }

        }
        elseif ($request->inputLoanUpdate == 5) {
            $userLoanId->update([
                'loanstatus_id' => $request->inputLoanUpdate,
            ]);

            Loanhistory::create([
                'transaction_type' => 'loan disbursement',
                'user_id' => $userId,
                'loan_id' => $loanId,
            ]);

            $userLoanId->user->notify(new LoanStatusUpdated());

            //send via sms
            // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
            // $client = new \Vonage\Client($basic);

            // $response = $client->sms()->send(
            //     new \Vonage\SMS\Message\SMS($user->phone, "apao", "Your financial assistance status has been changed to " . $financialAssistanceId->user->financialAssistanceStatus->financial_assistance_status_name)
            // );

            // $message = $response->current();

            // if ($message->getStatus() == 0) {
            //     toastr()->timeOut(7500)->addSuccess('The user\'s credentials has been sent via email and SMS!');
            // } else {
            //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
            // }
        }
        else
        {
            $userLoanId->update([
                'loanstatus_id' => $request->inputLoanUpdate,
            ]);

            // Send an email notification to the user
            if (in_array($request->inputLoanUpdate, [2, 3, 4])) {
                // Use the IDs that correspond to "pending," "approved," and "disbursed" status
                $userLoanId->user->notify(new LoanStatusUpdated());

                //send via sms
                // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
                // $client = new \Vonage\Client($basic);

                // $response = $client->sms()->send(
                //     new \Vonage\SMS\Message\SMS($user->phone, "apao", "Your financial assistance status has been changed to " . $financialAssistanceId->user->financialAssistanceStatus->financial_assistance_status_name)
                // );

                // $message = $response->current();

                // if ($message->getStatus() == 0) {
                //     toastr()->timeOut(7500)->addSuccess('The user\'s credentials has been sent via email and SMS!');
                // } else {
                //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
                // }
            }
        }

        toastr()->timeOut(10000)->addSuccess('Beneficiary Incoming Loan Status has been updated!');

        return redirect()->route('agripinayprojectcoordinator.progress');
    } // End Method

    public function ProjCoordinatorCurrentLoanUpdate(Request $request)
    {
        $loanId = $request->loanId;

        $userId = $request->userId;

        $userLoanId = Loan::findOrFail($loanId);

        /** @var \App\Models\User $user **/
            //Access the authenticated user's id
            $user = User::findOrFail($userId);

        if ($request->inputCurrentLoanUpdate == 3) {
            $userLoanId->update([
                'currentloanstatus_id' => $request->inputCurrentLoanUpdate,
            ]);

            Loanhistory::create([
                'transaction_type' => 'loan repayment',
                'user_id' => $userId,
                'loan_id' => $loanId,
            ]);

            $userLoanId->user->notify(new CurrentLoanUpdate());

            //send via sms
            // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
            // $client = new \Vonage\Client($basic);

            // $response = $client->sms()->send(
            //     new \Vonage\SMS\Message\SMS($user->phone, "apao", "Your financial assistance status has been changed to " . $financialAssistanceId->user->financialAssistanceStatus->financial_assistance_status_name)
            // );

            // $message = $response->current();

            // if ($message->getStatus() == 0) {
            //     toastr()->timeOut(7500)->addSuccess('The user\'s credentials has been sent via email and SMS!');
            // } else {
            //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
            // }
        }
        else
        {
            $userLoanId->update([
                'currentloanstatus_id' => $request->inputCurrentLoanUpdate,
            ]);

            // Send an email notification to the user
            if (in_array($request->inputCurrentLoanUpdate, [2, 4])) {
                // Use the IDs that correspond to "pending," "approved," and "disbursed" status
                $userLoanId->user->notify(new CurrentLoanUpdate());

                //send via sms
                // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
                // $client = new \Vonage\Client($basic);

                // $response = $client->sms()->send(
                //     new \Vonage\SMS\Message\SMS($user->phone, "apao", "Your financial assistance status has been changed to " . $financialAssistanceId->user->financialAssistanceStatus->financial_assistance_status_name)
                // );

                // $message = $response->current();

                // if ($message->getStatus() == 0) {
                //     toastr()->timeOut(7500)->addSuccess('The user\'s credentials has been sent via email and SMS!');
                // } else {
                //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
                // }
            }
        }

        toastr()->timeOut(10000)->addSuccess('Beneficiary Current Loan Status has been updated!');

        return redirect()->route('agripinayprojectcoordinator.progress');
    } // End Method


    public function ProjCoordinatorProgressUpdateRepayment(Request $request)
    {
        $loanId = $request->loanId;

        $userId = $request->userId;

        $userLoanId = Loan::findOrFail($loanId);

        $validatedData = $request->validate([
            'inputRepayment' => 'required', 'numeric', 'min:0', 'max:' . $userLoanId->remaining_loan_balance,
        ]);

        // Subtract the inputRepayment from remaining_loan_balance
        $newRemainingBalance = $userLoanId->remaining_loan_balance - $validatedData['inputRepayment'];

        // Update the remaining_loan_balance
        $userLoanId->update([
            'remaining_loan_balance' => $newRemainingBalance
        ]);

        /** @var \App\Models\User $user **/
            //Access the authenticated user's id
            $user = User::findOrFail($userId);

        if ($userLoanId->remaining_loan_balance == 0) {
            // If there is no more balance left in loan then update the status of loan as fully paid
            $userLoanId->update([
                'currentloanstatus_id' => 3
            ]);

            Loanhistory::create([
                'transaction_type' => 'loan repayment',
                'user_id' => $userId,
                'loan_id' => $loanId,
            ]);

            $userLoanId->user->notify(new CurrentLoanUpdate());

            //send via sms
            // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
            // $client = new \Vonage\Client($basic);

            // $response = $client->sms()->send(
            //     new \Vonage\SMS\Message\SMS($user->phone, "apao", "Your financial assistance status has been changed to " . $financialAssistanceId->user->financialAssistanceStatus->financial_assistance_status_name)
            // );

            // $message = $response->current();

            // if ($message->getStatus() == 0) {
            //     toastr()->timeOut(7500)->addSuccess('The user\'s credentials has been sent via email and SMS!');
            // } else {
            //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
            // }
        }

        $user->notify(new LoanRepaymentNotif());
        // Status is "rejected," delete the associated row

        //send via sms
        // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS($user->phone, "apao", "Your financial assistance status has been REJECTED. \n You may send an inquiry or contact your program Project Coordinator.")
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     toastr()->timeOut(7500)->addSuccess('The user\'s credentials has been sent via email and SMS!');
        // } else {
        //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
        // }

        toastr()->timeOut(10000)->addSuccess('Beneficiary loan repayment successful!');

        return redirect()->route('agripinayprojectcoordinator.progress');
    } // End Method

    public function ProjCoordinatorProgressLoanReminder(Request $request, $userId)
    {
        try {
            $currentTime = now()->format('Y-m-d H:i:s');

                $user = User::findOrFail($userId);
    
                $user->notify(new RepaymentSchedule());
                // Status is "rejected," delete the associated row
    
                //send via sms
                // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
                // $client = new \Vonage\Client($basic);
    
                // $response = $client->sms()->send(
                //     new \Vonage\SMS\Message\SMS($user->phone, "apao", "Your financial assistance status has been REJECTED. \n You may send an inquiry or contact your program Project Coordinator.")
                // );
    
                // $message = $response->current();
    
                // if ($message->getStatus() == 0) {
                //     toastr()->timeOut(7500)->addSuccess('The user\'s credentials has been sent via email and SMS!');
                // } else {
                //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
                // }
    
            toastr()->timeOut(10000)->addSuccess('Loan Reminder Sent!');

            return response()->json(['message' => 'Loan Reminder Notification sent successfully']);
        } catch (\Exception $e) {
        return response()->json(['error' => 'Error sending notification: ' . $e->getMessage()], 500);
        }
    } // End Method

    public function ProjCoordinatorViewProfile()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        return view('AGRIPINAY_Project_Coordinator.profile', compact('userProfileData'));
    } // End Method

    

    public function ProjCoordinatorEditProfile(Request $request)
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userData = User::find($id);

        $userData->first_name = $request->first_name;
        $userData->middle_name = $request->middle_name;
        $userData->last_name = $request->last_name;
        $userData->phone = $request->phone;
        $userData->barangay = $request->primary_address;
        $userData->city = $request->city;
        $userData->province = $request->province;
        $userData->zip = $request->zip;

        if ($request->file('photo'))
        {
            $file = $request->file('photo');

            @unlink(public_path('Uploads/Coordinator_Images/'.$userData->photo));

            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('Uploads/Coordinator_Images'),$fileName);
            $userData['photo'] = $fileName;
        }
        $userData->save();

        //notify on email
        $userData->notify(new AccountUpdateNotif());

        //send via sms
        // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS($userData->phone, "apao", "Your account for Albay Provincial Agriculture Office has been successfully updated!")
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     toastr()->timeOut(7500)->addSuccess('The user\'s credentials has been sent via email and SMS!');
        // } else {
        //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
        // }

        toastr()->timeOut(10000)->addSuccess('Your Profile has been Updated!');

        return redirect()->back();
    } // End Method
    
    public function ProjCoordinatorViewChangePassword()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        return view('AGRIPINAY_Project_Coordinator.pass', compact('userProfileData'));
    } // End Method

    public function ProjCoordinatorEditChangePassword(Request $request)
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userData = User::find($id);

        //Validation
        $request->validate([
            'inputOldPassword' => 'required',
            'inputNewPassword' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->mixedCase()->symbols() ],
        ]);

        ///Match the old password
        if (!Hash::check($request->inputOldPassword, $userData->password))
        {
        //confirmation message
        toastr()->timeOut(10000)->addError('Old Password does not match!');

        return redirect()->back();
        }

        //Update the new password
        $userData->update([
            'password' => Hash::make($request->inputNewPassword) //inputNewPassword field name from name="inputNewPassword" in admin_change_password.blade.php
        ]);

        //notify on email
        $userData->notify(new PasswordUpdateNotif());

        //send via sms
        // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS($userData->phone, "apao", "Your account password for Albay Provincial Agriculture Office has been successfully updated!")
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     toastr()->timeOut(7500)->addSuccess('The user\'s credentials has been sent via email and SMS!');
        // } else {
        //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
        // }

        toastr()->timeOut(10000)->addSuccess('Your Password has been Updated!');

        return redirect()->back();
    } // End Method

    public function ProjCoordinatorRegisterView()
    {
        //Access the authenticated user's id
        $programId = AUTH::user()->program_id;
        // $users = User::orderBy('id', 'asc')->get();
        $roles = Role::all();
        $statuses = Status::all();

        $users = User::whereHas('role', function ($query) {
            $query->where('role_name', 'beneficiary');
        })->whereHas('program', function ($query) use ($programId) {
            $query->where('id', $programId);
        })->where('blacklisted', false)->get();

        return view('AGRIPINAY_Project_Coordinator.registerView', compact('users', 'roles', 'statuses'));
    } // End Method

    public function ProjCoordinatorRegisterEditUser(Request $request)
    {
        $userId = $request->id;

        $userData = User::findOrFail($userId);

        $userData->update([
            'status_id' =>$request->inputStatus,
        ]);

        $userData->save();

        //notify on email
        $userData->notify(new InactiveStatusNotif());

        //send via sms
        // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS($userData->phone, "apao", "Your account for Albay Provincial Agriculture Office has been set to " . $userdata->status-status_name ."\n If you're status is INACTIVE, Logging in to the Web Application using your account is forbidden. \n You may contact your program coordinator at the Albay Provincial Agriculture Office or send an Inquiry.")
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     toastr()->timeOut(7500)->addSuccess('Message has been sent via email and SMS!');
        // } else {
        //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
        // }


        toastr()->timeOut(10000)->addSuccess('User data has been updated successfully!');
        
        return redirect()->back();
    } // End Method

    public function notifyBeneficiaries(Request $request)
    {
        try {
            $description = $request->input('description');

            // Get authenticated user with the role "coordinator"
            $coordinator = auth()->user();

            // Find beneficiaries with the same "program_id"
            $beneficiaries = User::where('role_id', 7)
                ->where('program_id', $coordinator->program_id)
                ->where('blacklisted', false)->whereHas('status', function ($query) {
                    $query->where('status_name', 'Active');
                })->get();

            // Send emails to beneficiaries
            foreach ($beneficiaries as $beneficiary) {
                // Send email using the FinancialAssistanceStatusUpdate Mailable
                Mail::to($beneficiary->email)->send(new LoanStatusUpdate($description));

                //send via sms
                // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
                // $client = new \Vonage\Client($basic);

                // $response = $client->sms()->send(
                //     new \Vonage\SMS\Message\SMS($beneficiary->phone, "apao", "Financial Assistance Update\n\n" . $description)
                // );

                // $message = $response->current();

                // if ($message->getStatus() == 0) {
                //     toastr()->timeOut(7500)->addSuccess('Message has been sent via email and SMS!');
                // } else {
                //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
                // }
            }

            toastr()->timeOut(10000)->addSuccess('Tracking step notification has been sent to all program beneficiaries successfully!');

            return response()->json(['message' => 'Notification sent successfully']);
        } catch (\Exception $e) {
        return response()->json(['error' => 'Error sending notification: ' . $e->getMessage()], 500);
        }
    }

    public function CoordinatorBlacklistView()
    {
        //Access the authenticated user's id
        $id = AUTH::user()->id;

        //Access the specific row data of the user's id
        $userProfileData = User::find($id);

        $users = User::orderBy('id', 'asc')->where('blacklisted', true)->get();

        return view('AGRIPINAY_Project_Coordinator.blacklisted', compact('userProfileData', 'users'));
    } // End Method

    public function CoordinatorBlacklistUser($id)
    {
        $userId = User::findOrFail($id);

        if ($userId->loan) {
            $loanId = $userId->loan->id;

            $userLoanId = Loan::findOrFail($loanId);

            $userLoanId->delete();

            $userId->update([
                'blacklisted' => true,
            ]);
        }
        else {
            $userId->update([
                'blacklisted' => true,
            ]);
        }


        //notify via email
        $userId->notify(new BlacklistNotification());

        //send via sms
        // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS($userId->phone, "apao", "Your account for Albay Provincial Agriculture Office has been Blacklisted, please contact your Program Project Coordinator for inquiries.")
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     toastr()->timeOut(7500)->addSuccess('Notification has been sent via email and SMS!');
        // } else {
        //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
        // }

        toastr()->timeOut(10000)->addSuccess('User has been Blacklisted!');

        return redirect()->back();
    } // End Method

    public function CoordinatorRestoreUser($id)
    {
        $userId = User::findOrFail($id);

        $userId->update([
            'blacklisted' => false,
        ]);

        //notify via email
        $userId->notify(new RestoreNotification());

        //send via sms
        // $basic  = new \Vonage\Client\Credentials\Basic("fd2194d6", "JlrdWbcttBX5OdVs");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS($userId->phone, "apao", "Your account for Albay Provincial Agriculture Office has been Restored, you may login again!")
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     toastr()->timeOut(7500)->addSuccess('Notification has been sent via email and SMS!');
        // } else {
        //     toastr()->timeOut(7500)->addSuccess('The message failed with status: ' . $message->getStatus());
        // }

        toastr()->timeOut(10000)->addSuccess('User has been Restored!');

        return redirect()->back();
    } // End Method
}

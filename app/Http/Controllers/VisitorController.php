<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\announcement;
use App\Models\events;
use App\Models\Program;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    public function VisitorHome()
    {
        $programs = Program::all();

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

        //get all users with role beneficiary on each program
        $programs = Program::with(['user' => function ($query) {
            $query->whereHas('role', function ($subQuery) {
                $subQuery->where('role_name', 'beneficiary');
            });
        }])->get();

        $beneficiaryCount = [];
        $cities = [];

        foreach ($programs as $program) {
            $city = $program->user->first()->city; // Assuming each program has at least one user
            
            if (!in_array($city, $cities)) {
                $cities[] = $city;
            }

            if (!isset($beneficiaryCount[$program->program_name])) {
                $beneficiaryCount[$program->program_name] = [];
            }

            $beneficiaryCount[$program->program_name][$city] = $program->user->where('role.role_name', 'beneficiary')->count();
        }


        toastr()->timeOut(10000)->addInfo('Welcome to the Website of APAO Region V!');

        return view('Visitor.visitor_index', compact('programs', 'programNames', 'beneficiaryCounts', 'dataLineChart', 'months', 'monthCount', 'beneficiaryCount', 'cities'));
    } // End Method

    public function visitorProgramsView($id)
    {
        //get all coordinators associated with a specific program
        $program = Program::with('coordinators')->findOrFail($id);

        if (!$program) {
            abort(404); // Program not found
        }
    
        $beneficiaries = User::where('program_id', $id)
            ->whereHas('role', function ($query) {
                $query->where('role_name', 'beneficiary');
            })
            ->select('city', DB::raw('count(*) as count'))
            ->groupBy('city')
            ->get();

        // dd($program->coordinators);

        return view('Visitor.category_page', compact('program', 'beneficiaries'));
    } // End Method
}

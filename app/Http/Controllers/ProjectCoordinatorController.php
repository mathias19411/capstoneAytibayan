<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectCoordinatorController extends Controller
{
    public function ProjectCoordinatorDashboard()
    {
        return view('Project_Coordinator.projectcoordinator_dashboard');
    } // End Method
}

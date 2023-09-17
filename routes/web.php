<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ItStaffController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectCoordinatorController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('Visitor.visitor_index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//IT Staff Group Middleware
Route::middleware(['auth', 'userroleprotection:itstaff'])->group(function(){
    // middleware named userroleprotection will protect routes to be only accessible by the right user role
    Route::get('/ITStaff/home', [ItStaffController::class, 'ItStaffHome'])->name('itstaff.home');

    //ITStaff Logout
    Route::get('/ITStaff/logout', [ItStaffController::class, 'ItStaffLogout'])->name('itstaff.logout');

    Route::get('/ITStaff/addprogram', [ItStaffController::class, 'ItStaffAddProgram'])->name('itstaff.addProgram');

    Route::get('/ITStaff/editprogram', [ItStaffController::class, 'ItStaffEditProgram'])->name('itstaff.editProgram');

    Route::get('/ITStaff/announcement', [ItStaffController::class, 'ITStaffAnnouncement'])->name('itstaff.announcement');

    Route::get('/ITStaff/event', [ItStaffController::class, 'ITStaffEvent'])->name('itstaff.event');

    //IT Staff View Profile
    Route::get('/ITStaff/viewprofile', [ItStaffController::class, 'ITStaffViewProfile'])->name('itstaff.viewprofile');

    //IT Staff Edit Profile Data
    Route::post('/ITStaff/editprofile', [ItStaffController::class, 'ITStaffEditProfile'])->name('itstaff.editprofile');

    //IT Staff View Change Password
    Route::get('/ITStaff/viewchangepassword', [ItStaffController::class, 'ITStaffViewChangePassword'])->name('itstaff.viewchangepassword');

    //IT Staff Edit Change Password
    Route::post('/ITStaff/editchangepassword', [ItStaffController::class, 'ITStaffEditChangePassword'])->name('itstaff.editchangepassword');
    
}); //End group itstaff middleware

//Project Coordinator Group Middleware
Route::middleware(['auth', 'userroleprotection:project_coordinator'])->group(function(){
    // middleware named userroleprotection will protect routes to be only accessible by the right user role
    Route::get('/ProjectCoordinator/home', [ProjectCoordinatorController::class, 'ProjectCoordinatorHome'])->name('projectcoordinator.home');

    //ITStaff Logout
    Route::get('/ProjectCoordinator/logout', [ProjectCoordinatorController::class, 'ProjectCoordinatorLogout'])->name('projectCoordinator.logout');

    Route::get('/Project_Coordinator/inquiry', [ProjectCoordinatorController::class, 'ProjectCoordinatorDashboard'])->name('Project_Coordinator.inquiry');

    // more routes here for Project Coordinator

}); //End group Project Coordinator middleware

//Beneficiary Group Middleware
Route::middleware(['auth', 'userroleprotection:beneficiary'])->group(function(){
    // middleware named userroleprotection will protect routes to be only accessible by the right user role
    Route::get('/beneficiary/dashboard', [BeneficiaryController::class, 'BeneficiaryDashboard'])->name('beneficiary.dashboard');

    // more routes here for beneficiary

}); //End group beneficiary middleware

//Visitor Routes
Route::get('/', [VisitorController::class, 'VisitorHome'])->name('visitor.home');

Route::get('/Visitor/contacts', function () {
    return view('Visitor.contacts');
});

Route::get('/Visitor/programs', function () {
    return view('Visitor.programs');
});

Route::get('/Visitor/programs_view', function () {
    return view('Visitor.programs_view');
});

Route::get('/Visitor/about', function () {
    return view('Visitor.about');
});

Route::get('/Visitor/category_page/{category}', function ($category) {
    // You can pass the $category variable to the view or use it to fetch category information from the database
    return view('Visitor.category_page', compact('category'));
})->name('Visitor.category.page');

Route::get('/Visitor', [EventController::class, 'index']);

//store-event
route::post('/ITStaff/event', [EventController::class, 'store'])->name('store-event');

//store-announcement
route::post('/ITStaff/announcement', [AnnouncementController::class, 'store'])->name('store-announcement');


Route::get('/Project_Coordinator/inquiry', function () {
    return view('Project_Coordinator.inquiry');
});

Route::get('/Project_Coordinator/beneficiary', function () {
    return view('Project_Coordinator.beneficiary');
});

Route::get('/Project_Coordinator/announcement', function () {
    return view('Project_Coordinator.announcement');
});

Route::get('/Project_Coordinator/event', function () {
    return view('Project_Coordinator.event');
});

Route::get('/Project_Coordinator/registration', function () {
    return view('Project_Coordinator.registration');
});

Route::get('/Project_Coordinator/progress', function () {
    return view('Project_Coordinator.progress');
});

Route::get('/Project_Coordinator/profile', function () {
    return view('Project_Coordinator.profile');
});

Route::get('/Project_Coordinator/pass', function () {
    return view('Project_Coordinator.pass');
});



Route::get('/Beneficiary/schedule', function () {
    return view('Beneficiary.schedule');
});
<?php

use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ItStaffController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectCoordinatorController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//IT Staff Group Middleware
Route::get('/itstaff/dashboard', [ItStaffController::class, 'ItStaffDashboard'])->name('itstaff.dashboard');

Route::get('/ITStaff/home', function () {
    return view('ITStaff.home');
});

Route::get('/ITStaff/addprogram', function () {
    return view('ITStaff.addprogram');
});

Route::get('/ITStaff/edit_program', function () {
    return view('ITStaff.edit_program');
});

Route::get('/ITStaff/announcement', function () {
    return view('ITStaff.announcement');
});

Route::get('/ITStaff/event', function () {
    return view('ITStaff.event');
});

Route::get('/ITStaff/registration', function () {
    return view('ITStaff.registration');
});

//Project Coordinator Group Middleware
Route::get('/projectcoordinator/dashboard', [ProjectCoordinatorController::class, 'ProjectCoordinatorDashboard'])->name('projectcoordinator.dashboard');

//Beneficiary Group Middleware
Route::get('/beneficiary/dashboard', [BeneficiaryController::class, 'BeneficiaryDashboard'])->name('beneficiary.dashboard');


//Visitor Routes
Route::get('/visitor/dashboard', [VisitorController::class, 'VisitorDashboard'])->name('visitor.dashboard');


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

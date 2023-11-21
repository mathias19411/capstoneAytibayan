<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ItStaffController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectCoordinatorController;
use App\Http\Controllers\ABAKAProjectCoordinatorController;
use App\Http\Controllers\AGRIPINAYProjectCoordinatorController;
use App\Http\Controllers\AKBAYProjectCoordinatorController;
use App\Http\Controllers\LEADProjectCoordinatorController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\Auth\TwoFactorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\SmsController;

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


// Route::get('/', function () {
//     return view('Visitor.visitor_index');
// });

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
Route::middleware(['auth', 'twofactor', 'userroleprotection:itstaff'])->group(function(){
    // middleware named userroleprotection will protect routes to be only accessible by the right user role
    Route::get('/ITStaff/home', [ItStaffController::class, 'ItStaffHome'])->name('itstaff.home');

    //ITStaff Logout
    Route::get('/ITStaff/logout', [ItStaffController::class, 'ItStaffLogout'])->name('itstaff.logout');

    //add program view
    Route::get('/ITStaff/addprogramview', [ItStaffController::class, 'ItStaffAddProgramView'])->name('itstaff.addProgramView');

    //add new program
    Route::post('/ITStaff/addnewprogram', [ItStaffController::class, 'ItStaffAddNewProgram'])->name('itstaff.addNewProgram');

    //edit program view
    Route::get('/ITStaff/editprogramview/{id}', [ItStaffController::class, 'ItStaffEditProgramView'])->name('itstaff.editProgramView');

    //edit existing program 
    Route::post('/ITStaff/updateProgram', [ItStaffController::class, 'ItStaffUpdateProgram'])->name('itstaff.updateProgram');

    Route::get('/ITStaff/announcement', [ItStaffController::class, 'ITStaffAnnouncement'])->name('itstaff.announcement');

    Route::post('/ITStaff/announcement', [ItStaffController::class, 'ITStaffAnnouncementStore'])->name('store.announcement');

    Route::get('/ITStaff/announcement/{id}', [ItStaffController::class, 'ITStaffAnnouncementEdit'])->name('edit.announcement');

    Route::patch('/ITStaff/announcement', [ItStaffController::class, 'ITStaffAnnouncementUpdate'])->name('update.announcement');

    Route::delete('/ITStaff/announcement', [ItStaffController::class, 'ITStaffAnnouncementDelete'])->name('delete.announcement');
    
    
    Route::get('/ITStaff/event', [ItStaffController::class, 'ITStaffEvent'])->name('itstaff.event');

    Route::post('/ITStaff/event', [ItStaffController::class, 'ITStaffEventStore'])->name('store.event');

    Route::get('/ITStaff/event/{id}', [ItStaffController::class, 'ITStaffEventEdit'])->name('edit.event');
    
    Route::patch('/ITStaff/event', [ItStaffController::class, 'ITStaffEventUpdate'])->name('update.event');
    Route::delete('/ITStaff/event', [ItStaffController::class, 'ITStaffEventDelete'])->name('delete.event');

    //IT Staff View Profile
    Route::get('/ITStaff/viewprofile', [ItStaffController::class, 'ITStaffViewProfile'])->name('itstaff.viewprofile');

    //IT Staff Edit Profile Data
    Route::post('/ITStaff/editprofile', [ItStaffController::class, 'ITStaffEditProfile'])->name('itstaff.editprofile');

    //IT Staff View Change Password
    Route::get('/ITStaff/viewchangepassword', [ItStaffController::class, 'ITStaffViewChangePassword'])->name('itstaff.viewchangepassword');

    //IT Staff Edit Change Password
    Route::post('/ITStaff/editchangepassword', [ItStaffController::class, 'ITStaffEditChangePassword'])->name('itstaff.editchangepassword');

    //IT Staff Register View
    Route::get('/ITStaff/registerview', [ItStaffController::class, 'ITStaffRegisterView'])->name('itstaff.registerView');

    //IT Staff Edit user status and role
    Route::post('/ITStaff/registeredituser', [ItStaffController::class, 'ITStaffRegisterEditUser'])->name('itstaff.registerEditUser');
    
}); //End group itstaff middleware

//Project Coordinator BINHI Group Middleware
Route::middleware(['auth', 'twofactor', 'userroleprotection:projectcoordinator'])->group(function(){
    // middleware named userroleprotection will protect routes to be only accessible by the right user role
    Route::get('/ProjectCoordinator/home', [ProjectCoordinatorController::class, 'ProjectCoordinatorHome'])->name('projectcoordinator.beneficiaries');

    //ITStaff Logout
    Route::get('/ProjectCoordinator/logout', [ProjectCoordinatorController::class, 'ProjectCoordinatorLogout'])->name('projectCoordinator.logout');

    Route::get('ProjectCoordinator/inquiry', [ProjectCoordinatorController::class, 'ProjectCoordinatorDashboard'])->name('Project_Coordinator.inquiry');

    Route::get('/ProjectCoordinator/Announcements', [ProjectCoordinatorController::class, 'ProjCoordinatorAnnouncement'])->name('projectcoordinator.announcement');
    Route::post('/ProjectCoordinator/Announcements', [ProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementStore'])->name('store.announcementcoordinator');
    Route::get('/ProjectCoordinator/Announcements/{id}', [ProjectCoordinatorController::class, 'ProjectCoordinatorAnnouncementEdit'])->name('edit.announcementcoordinator');
    Route::patch('/ProjectCoordinator/Announcements', [ProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementUpdate'])->name('update.announcementcoordinator');
    Route::delete('/ProjectCoordinator/Announcements', [ProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementDelete'])->name('delete.announcementcoordinator');

    Route::get('/ProjectCoordinator/Events', [ProjectCoordinatorController::class, 'ProjCoordinatorEvent'])->name('projectcoordinator.event');
    Route::post('/ProjectCoordinator/Events', [ProjectCoordinatorController::class, 'ProjCoordinatorEventStore'])->name('store.eventcoordinator');
    Route::get('/ProjectCoordinator/Events/{id}', [ProjectCoordinatorController::class, 'ProjectCoordinatorEventEdit'])->name('edit.eventcoordinator');
    Route::patch('/ProjectCoordinator/Events', [ProjectCoordinatorController::class, 'ProjCoordinatorEventUpdate'])->name('update.eventcoordinator');
    Route::delete('/ProjectCoordinator/Events', [ProjectCoordinatorController::class, 'ProjCoordinatorEventDelete'])->name('delete.eventcoordinator');

    Route::get('/ProjectCoordinator/Inquriy', [ProjectCoordinatorController::class, 'ProjCoordinatorInquiry'])->name('projectcoordinator.inquiry');

    Route::get('ProjectCoordinator/Progress', [ProjectCoordinatorController::class, 'ProjCoordinatorProgress'])->name('projectcoordinator.progress');

    // more routes here for Project Coordinator

}); //End group Project Coordinator middleware

//Project Coordinator AGRIPINAY Group Middleware
Route::middleware(['auth', 'twofactor', 'userroleprotection:agripinayprojectcoordinator'])->group(function(){
    // middleware named userroleprotection will protect routes to be only accessible by the right user role
    Route::get('/AGRIPINAY_ProjectCoordinator/home', [AGRIPINAYProjectCoordinatorController::class, 'ProjectCoordinatorHome'])->name('agripinayprojectcoordinator.beneficiaries');

    //ITStaff Logout
    Route::get('/AGRIPINAY_ProjectCoordinator/logout', [AGRIPINAYProjectCoordinatorController::class, 'ProjectCoordinatorLogout'])->name('agripinayprojectCoordinator.logout');

    Route::get('/AGRIPINAY_ProjectCoordinator/inquiry', [AGRIPINAYProjectCoordinatorController::class, 'ProjectCoordinatorDashboard'])->name('AGRIPINAY_Project_Coordinator.inquiry');

    Route::get('/AGRIPINAY_ProjectCoordinator/Announcements', [AGRIPINAYProjectCoordinatorController::class, 'ProjCoordinatorAnnouncement'])->name('agripinayprojectcoordinator.announcement');
    Route::post('/AGRIPINAY_ProjectCoordinator/Announcements', [AGRIPINAYProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementStore'])->name('store.announcementcoordinatoragripinay');
    Route::get('/AGRIPINAY_ProjectCoordinator/Announcements/{id}', [AGRIPINAYProjectCoordinatorController::class, 'ProjectCoordinatorAnnouncementEdit'])->name('edit.announcementcoordinatoragripinay');
    Route::patch('/AGRIPINAY_ProjectCoordinator/Announcements', [AGRIPINAYProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementUpdate'])->name('update.announcementcoordinatoragripinay');
    Route::delete('/AGRIPINAY_ProjectCoordinator/Announcements', [AGRIPINAYProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementDelete'])->name('delete.announcementcoordinatoragripinay');

    Route::get('/AGRIPINAY_ProjectCoordinator/Events', [AGRIPINAYProjectCoordinatorController::class, 'ProjCoordinatorEvent'])->name('agripinayprojectcoordinator.event');
    Route::post('/AGRIPINAY_ProjectCoordinator/Events', [AGRIPINAYProjectCoordinatorController::class, 'ProjCoordinatorEventStore'])->name('store.eventcoordinatoragripinay');
    Route::get('/AGRIPINAY_ProjectCoordinator/Events/{id}', [AGRIPINAYProjectCoordinatorController::class, 'ProjectCoordinatorEventEdit'])->name('edit.eventcoordinatoragripinay');
    Route::patch('/AGRIPINAY_ProjectCoordinator/Events', [AGRIPINAYProjectCoordinatorController::class, 'ProjCoordinatorEventUpdate'])->name('update.eventcoordinatoragripinay');
    Route::delete('/AGRIPINAY_ProjectCoordinator/Events', [AGRIPINAYProjectCoordinatorController::class, 'ProjCoordinatorEventDelete'])->name('delete.eventcoordinatoragripinay');

    Route::get('/AGRIPINAY_ProjectCoordinator/Inquriy', [AGRIPINAYProjectCoordinatorController::class, 'ProjCoordinatorInquiry'])->name('agripinayprojectcoordinator.inquiry');

    Route::get('/AGRIPINAY_ProjectCoordinator/Progress', [AGRIPINAYProjectCoordinatorController::class, 'ProjCoordinatorProgress'])->name('agripinayprojectcoordinator.progress');

    // more routes here for Project Coordinator

}); //End group Project Coordinator middleware

//Project Coordinator AKBAY Group Middleware
Route::middleware(['auth', 'twofactor', 'userroleprotection:akbayprojectcoordinator'])->group(function(){
    // middleware named userroleprotection will protect routes to be only accessible by the right user role
    Route::get('/AKBAY_ProjectCoordinator/home', [AKBAYProjectCoordinatorController::class, 'ProjectCoordinatorHome'])->name('akbayprojectcoordinator.beneficiaries');

    //ITStaff Logout
    Route::get('/AKBAY_ProjectCoordinator/logout', [AKBAYProjectCoordinatorController::class, 'ProjectCoordinatorLogout'])->name('akbayprojectCoordinator.logout');

    Route::get('/AKBAY_ProjectCoordinator/inquiry', [AKBAYProjectCoordinatorController::class, 'ProjectCoordinatorDashboard'])->name('AKBAY_Project_Coordinator.inquiry');

    Route::get('/AKBAY_ProjectCoordinator/Announcements', [AKBAYProjectCoordinatorController::class, 'ProjCoordinatorAnnouncement'])->name('akbayprojectcoordinator.announcement');
    Route::post('/AKBAY_ProjectCoordinator/Announcements', [AKBAYProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementStore'])->name('store.announcementcoordinatorakbay');
    Route::get('/AKBAY_ProjectCoordinator/Announcements/{id}', [AKBAYProjectCoordinatorController::class, 'ProjectCoordinatorAnnouncementEdit'])->name('edit.announcementcoordinatorakbay');
    Route::patch('/AKBAY_ProjectCoordinator/Announcements', [AKBAYProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementUpdate'])->name('update.announcementcoordinatorakbay');
    Route::delete('/AKBAY_ProjectCoordinator/Announcements', [AKBAYProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementDelete'])->name('delete.announcementcoordinatorakbay');

    Route::get('/AKBAY_ProjectCoordinator/Events', [AKBAYProjectCoordinatorController::class, 'ProjCoordinatorEvent'])->name('akbayprojectcoordinator.event');
    Route::post('/AKBAY_ProjectCoordinator/Events', [AKBAYProjectCoordinatorController::class, 'ProjCoordinatorEventStore'])->name('store.eventcoordinatorakbay');
    Route::get('/AKBAY_ProjectCoordinator/Events/{id}', [AKBAYProjectCoordinatorController::class, 'ProjectCoordinatorEventEdit'])->name('edit.eventcoordinatorakbay');
    Route::patch('/AKBAY_ProjectCoordinator/Events', [AKBAYProjectCoordinatorController::class, 'ProjCoordinatorEventUpdate'])->name('update.eventcoordinatorakbay');
    Route::delete('/AKBAY_ProjectCoordinator/Events', [AKBAYProjectCoordinatorController::class, 'ProjCoordinatorEventDelete'])->name('delete.eventcoordinatorakbay');

    Route::get('/AKBAY_ProjectCoordinator/Inquriy', [AKBAYProjectCoordinatorController::class, 'ProjCoordinatorInquiry'])->name('akbayprojectcoordinator.inquiry');

    Route::get('/AKBAY_ProjectCoordinator/Progress', [AKBAYProjectCoordinatorController::class, 'ProjCoordinatorProgress'])->name('akbayprojectcoordinator.progress');

    // more routes here for Project Coordinator

}); //End group Project Coordinator middleware

//Project Coordinator LEAD Group Middleware
Route::middleware(['auth', 'twofactor', 'userroleprotection:leadprojectcoordinator'])->group(function(){
    // middleware named userroleprotection will protect routes to be only accessible by the right user role
    Route::get('/LEAD_ProjectCoordinator/home', [LEADProjectCoordinatorController::class, 'ProjectCoordinatorHome'])->name('leadprojectcoordinator.beneficiaries');

    //ITStaff Logout
    Route::get('/LEAD_ProjectCoordinator/logout', [LEADProjectCoordinatorController::class, 'ProjectCoordinatorLogout'])->name('leadprojectCoordinator.logout');

    Route::get('/LEAD_ProjectCoordinator/inquiry', [LEADProjectCoordinatorController::class, 'ProjectCoordinatorDashboard'])->name('LEAD_Project_Coordinator.inquiry');

    Route::get('/LEAD_ProjectCoordinator/Announcements', [LEADProjectCoordinatorController::class, 'ProjCoordinatorAnnouncement'])->name('leadprojectcoordinator.announcement');
    Route::post('/LEAD_ProjectCoordinator/Announcements', [LEADProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementStore'])->name('store.announcementcoordinatorlead');
    Route::get('/LEAD_ProjectCoordinator/Announcements/{id}', [LEADProjectCoordinatorController::class, 'ProjectCoordinatorAnnouncementEdit'])->name('edit.announcementcoordinatorlead');
    Route::patch('/LEAD_ProjectCoordinator/Announcements', [LEADProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementUpdate'])->name('update.announcementcoordinatorlead');
    Route::delete('/LEAD_ProjectCoordinator/Announcements', [LEADProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementDelete'])->name('delete.announcementcoordinatorlead');

    Route::get('/LEAD_ProjectCoordinator/Events', [LEADProjectCoordinatorController::class, 'ProjCoordinatorEvent'])->name('leadprojectcoordinator.event');
    Route::post('/LEAD_ProjectCoordinator/Events', [LEADProjectCoordinatorController::class, 'ProjCoordinatorEventStore'])->name('store.eventcoordinatorlead');
    Route::get('/LEAD_ProjectCoordinator/Events/{id}', [LEADProjectCoordinatorController::class, 'ProjectCoordinatorEventEdit'])->name('edit.eventcoordinatorlead');
    Route::patch('/LEAD_ProjectCoordinator/Events', [LEADProjectCoordinatorController::class, 'ProjCoordinatorEventUpdate'])->name('update.eventcoordinatorlead');
    Route::delete('/LEAD_ProjectCoordinator/Events', [LEADProjectCoordinatorController::class, 'ProjCoordinatorEventDelete'])->name('delete.eventcoordinatorlead');

    Route::get('/LEAD_ProjectCoordinator/Inquriy', [LEADProjectCoordinatorController::class, 'ProjCoordinatorInquiry'])->name('leadprojectcoordinator.inquiry');

    Route::get('/LEAD_ProjectCoordinator/Progress', [LEADProjectCoordinatorController::class, 'ProjCoordinatorProgress'])->name('leadprojectcoordinator.progress');

    // more routes here for Project Coordinator

}); //End group Project Coordinator middleware

//Project Coordinator ABAKA Group Middleware
Route::middleware(['auth', 'twofactor', 'userroleprotection:abakaprojectcoordinator'])->group(function(){
    // middleware named userroleprotection will protect routes to be only accessible by the right user role

    //Coordinator Home Page
    Route::get('/ABAKA_ProjectCoordinator/home', [ABAKAProjectCoordinatorController::class, 'ProjectCoordinatorHome'])->name('abakaprojectcoordinator.beneficiaries');

    //Coordinator Logout
    Route::get('/ABAKA_ProjectCoordinator/logout', [ABAKAProjectCoordinatorController::class, 'ProjectCoordinatorLogout'])->name('abakaprojectCoordinator.logout');

    //Coordinator Inquiry
    Route::get('/ABAKA_ProjectCoordinator/inquiry', [ABAKAProjectCoordinatorController::class, 'ProjectCoordinatorDashboard'])->name('ABAKA_Project_Coordinator.inquiry');

    //Coordinator Announcements
    Route::get('/ABAKA_ProjectCoordinator/Announcements', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorAnnouncement'])->name('abakaprojectcoordinator.announcement');
    Route::post('/ABAKA_ProjectCoordinator/Announcements', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementStore'])->name('store.announcementcoordinatorabaka');
    Route::get('/ABAKA_ProjectCoordinator/Announcements/{id}', [ABAKAProjectCoordinatorController::class, 'ProjectCoordinatorAnnouncementEdit'])->name('edit.announcementcoordinatorabaka');
    Route::patch('/ABAKA_ProjectCoordinator/Announcements', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementUpdate'])->name('update.announcementcoordinatorabaka');
    Route::delete('/ABAKA_ProjectCoordinator/Announcements', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorAnnouncementDelete'])->name('delete.announcementcoordinatorabaka');

    //Coordinator Events
    Route::get('/ABAKA_ProjectCoordinator/Events', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorEvent'])->name('abakaprojectcoordinator.event');
    Route::post('/ABAKA_ProjectCoordinator/Events', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorEventStore'])->name('store.eventcoordinatorabaka');
    Route::get('/ABAKA_ProjectCoordinator/Events/{id}', [ABAKAProjectCoordinatorController::class, 'ProjectCoordinatorEventEdit'])->name('edit.eventcoordinatorabaka');
    Route::patch('/ABAKA_ProjectCoordinator/Events', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorEventUpdate'])->name('update.eventcoordinatorabaka');
    Route::delete('/ABAKA_ProjectCoordinator/Events', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorEventDelete'])->name('delete.eventcoordinatorabaka');

    //Coordinator Inquiry
    Route::get('/ABAKA_ProjectCoordinator/Inquriy', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorInquiry'])->name('abakaprojectcoordinator.inquiry');
    Route::post('/ABAKA_ProjectCoordinator/Inquriy/reply', [ABAKAProjectCoordinatorController::class, 'ProjectCoordinatorInquiryReply'])->name('reply.inquirycoordinatorabaka');
    Route::delete('/ABAKA_ProjectCoordinator/Inquriy/delete', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorInquiryDelete'])->name('delete.inquirycoordinatorabaka');

    //Coordinator Progress
    Route::get('/ABAKA_ProjectCoordinator/Progress', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorProgress'])->name('abakaprojectcoordinator.progress');
    Route::post('/Project_Coordinator/Project_Page/Add', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorAddProject'])->name('add.project');
    Route::patch('/ABAKA_ProjectCoordinator/Events', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorUpdateProject'])->name('edit.project');
    Route::delete('/ABAKA_ProjectCoordinator/Events', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorDeleteProject'])->name('delete.project');

    Route::post('/ABAKA_ProjectCoordinator/ProgressAdd', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorProgressAdd'])->name('abakaprojectcoordinator.progressAdd');

    Route::post('/ABAKA_ProjectCoordinator/ProgressUpdate', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorProgressUpdate'])->name('abakaprojectcoordinator.progressUpdate');

    //Abaka Coordinator View Profile
    Route::get('/ABAKA_ProjectCoordinator/viewprofile', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorViewProfile'])->name('abakaprojectcoordinator.viewprofile');

    //Abaka Coordinator Edit Profile Data
    Route::post('/ABAKA_ProjectCoordinator/editprofile', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorEditProfile'])->name('abakaprojectcoordinator.editprofile');

    //Abaka Coordinator View Change Password
    Route::get('/ABAKA_ProjectCoordinator/viewchangepassword', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorViewChangePassword'])->name('abakaprojectcoordinator.viewchangepassword');

    //Abaka Coordinator Edit Change Password
    Route::post('/ABAKA_ProjectCoordinator/editchangepassword', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorEditChangePassword'])->name('abakaprojectcoordinator.editchangepassword');

    //Abaka Coordinator Register View
    Route::get('/ABAKA_ProjectCoordinator/registerview', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorRegisterView'])->name('abakaprojectcoordinator.registerView');

    //Abaka Coordinator Edit user status and role
    Route::post('/ABAKA_ProjectCoordinator/registeredituser', [ABAKAProjectCoordinatorController::class, 'ProjCoordinatorRegisterEditUser'])->name('abakaprojectcoordinator.registerEditUser');

    //Notify all beneficiaries with status
    Route::post('/ABAKA_ProjectCoordinator/notify-beneficiaries', [ABAKAProjectCoordinatorController::class, 'notifyBeneficiaries']);

    // more routes here for Project Coordinator

}); //End group Project Coordinator middleware

//Beneficiary Group Middleware
Route::middleware(['auth', 'twofactor', 'userroleprotection:beneficiary'])->group(function(){
    // middleware named userroleprotection will protect routes to be only accessible by the right user role

    //Benef Logout
    Route::get('/Beneficiary/logout', [BeneficiaryController::class, 'BeneficiaryLogout'])->name('beneficiary.logout');

    //Benef Home Page
    Route::get('/Beneficiary/home', [BeneficiaryController::class, 'BeneficiaryHome'])->name('beneficiary.home');
    
    //Benef Updates
    Route::get('/Beneficiary/updates', [BeneficiaryController::class, 'BeneficiaryUpdates'])->name('beneficiary.updates');
    Route::post('/Beneficiary/updates', [BeneficiaryController::class, 'BeneficiaryUpdateStore'])->name('send.updates');
    Route::patch('/Beneficiary/updates/edit', [BeneficiaryController::class, 'BeneficiaryUpdateUpdate'])->name('edit.updates');

    //Benef Schedule
    Route::get('/Beneficiary/schedule', [BeneficiaryController::class, 'BeneficiarySchedule'])->name('beneficiary.schedule');
   
    //Benef Program Profile
    Route::get('/Beneficiary/programprofile', [BeneficiaryController::class, 'Beneficiaryprogramprofile'])->name('beneficiaryprogram.profile');

    //Benef Inquiry
    Route::get('/Beneficiary/Inquiry', [BeneficiaryController::class, 'BeneficiaryInquiry'])->name('beneficiary.inquiry');
    Route::post('/Beneficiary/Inquiry', [BeneficiaryController::class, 'BeneficiaryInquiryStore'])->name('beneficiary.inquiries');

    //Benef View Profile
    Route::get('/Beneficiary/viewprofile', [BeneficiaryController::class, 'BeneficiaryViewProfile'])->name('beneficiary.viewprofile');

    //Benef Edit Profile Data
    Route::post('/Beneficiary/editprofile', [BeneficiaryController::class, 'BeneficiaryEditProfile'])->name('beneficiary.editprofile');

    //Benef View Change Password
    Route::get('/Beneficiary/viewchangepassword', [BeneficiaryController::class, 'BeneficiaryViewChangePassword'])->name('beneficiary.viewchangepassword');

    //Benef Edit Change Password
    Route::post('/Beneficiary/editchangepassword', [BeneficiaryController::class, 'BeneficiaryEditChangePassword'])->name('beneficiary.editchangepassword');

    // more routes here for beneficiary

}); //End group beneficiary middleware

//Visitor Routes
Route::get('/', [VisitorController::class, 'VisitorHome'])->name('visitor.home');
Route::post('/Visitor/Inquiry', [VisitorController::class, 'VisitorInquiryStore'])->name('visitor.inquiry');
Route::post('/Visitor/Inquiry/ProgramPage', [VisitorController::class, 'VisitorInquiryStore'])->name('specificinquiry.send');

//resend two factor code route
Route::get('verify/resend', [TwoFactorController::class, 'resend'])->name('verify.resend');

Route::get('verify/index', [TwoFactorController::class, 'index'])->name('verify.index');

Route::post('verify/store', [TwoFactorController::class, 'store'])->name('verify.store');


Route::get('/Visitor/contacts', function () {
    return view('Visitor.contacts');
});

Route::get('/Visitor/programs', function () {
    return view('Visitor.programs');
});

Route::get('/Visitor/programs_view/{id}', [VisitorController::class, 'visitorProgramsView'])->name('visitor.programsView');


Route::get('/Visitor/about', function () {
    return view('Visitor.about');
});

Route::get('/Visitor/category_page/{category}', function ($category) {
    // You can pass the $category variable to the view or use it to fetch category information from the database
    return view('Visitor.category_page', compact('category'));
})->name('Visitor.category.page');

//send sms
Route::get('/sendsms', [SmsController::class, 'sendsms']);

//registerView
// route::post('/ITStaff/registerView', [RegisterViewController::class, 'store'])->name('store-registerView');

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



Route::get('/Beneficiary/benefprofile', function () {
    return view('Beneficiary.benefprofile');
});

Route::get('/Beneficiary/benefpass', function () {
    return view('Beneficiary.benefpass');
});

Route::get('/Beneficiary/programprofile', function () {
    return view('Beneficiary.programprofile');
});


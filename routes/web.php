<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   //Route::get('/home/contacts', [ProfileController::class, 'contact_view'])->name('profile.contact_view');
});

Route::get('/Contacts/contacts', function () {
    return view('Contacts.contacts');
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





require __DIR__.'/auth.php';

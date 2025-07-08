<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('home');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');



Route::get('/about', function () {
    return view('about');
});

Route::get('/updateprofile', function () {
    return view('updateprofile');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/project', function () {
    return view('project');
});

Route::get('/cv', function () {
    return view('cv');
});

Route::get('/dashboard/updateprofile', function () {
    return view('updateprofile');
})->name('dashboard.updateprofile')->middleware('auth');




Route::post('/profile/update-name', [ProfileController::class, 'updateName'])->name('profile.updateName');

Route::post('/profile/update-aboutyou', [ProfileController::class, 'updateAboutyou'])->name('profile.updateAboutyou');

Route::post('/profile/update-aboutme', [ProfileController::class, 'updateAboutMe'])->name('profile.updateAboutMe');


Route::post('/update-about-photo', [ProfileController::class, 'updateAboutPhoto'])->name('profile.updateAboutPhoto');

Route::get('/contact', [ContactController::class, 'show']);
Route::post('/contact', [ContactController::class, 'submit']);

Route::get('/contact/message', [ContactController::class, 'showMessages'])->name('contacts.messages');

Route::get('/dashboard', function () {
    return view('dashboard'); // Make sure dashboard.blade.php exists
})->name('dashboard');


Route::get('/project', [ProjectController::class, 'index']);
Route::get('/addp', [ProjectController::class, 'add']);
Route::post('/project', [ProjectController::class, 'store']);
Route::get('/update/{id}', [ProjectController::class, 'updateView']);
Route::put('/update/{id}', [ProjectController::class, 'update']);
Route::delete('/delete/{id}', [ProjectController::class, 'destroy']);
Route::get('/contact', [ProjectController::class, 'contact']);

Route::get('/update', function () {
    return view('update');
});

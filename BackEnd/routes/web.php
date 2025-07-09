<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\PickupHistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\NewRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestPickupController;
use App\Http\Controllers\ThirdSideBarController;
use App\Models\Account;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/pickuphistory',[PickupHistoryController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/account',[AccountController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/requestpickup',[RequestPickupController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/newrequest',[NewRequestController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/thirdsidebar',[ThirdSideBarController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/chat',[ChatController::class, 'index'])->middleware(['auth', 'verified']);


Route::post('/requestpickup', [RequestPickupController::class, 'store']);
Route::post('/thirdsidebar', [ThirdSideBarController::class, 'store']);
Route::post('/thirdsidebar', [ThirdSideBarController::class, 'store']);
Route::post('/chat', [ChatController::class, 'view_chat']);
Route::post('/account', [AccountController::class, 'save_change']);
Route::get('/chat', [ChatController::class, 'send_chat']);
// Route::get('/thirdsidebar', [ThirdSideBarController::class, 'check_email']);
Route::get('/chat', [ChatController::class, 'view_chat'])->middleware(['auth', 'verified']); // default
Route::get('/chat/send', [ChatController::class, 'send_chat'])->middleware(['auth', 'verified'])->name('chat.send');

// Route::get('/requestpickup', [RequestPickupController::class, 'upload_cek']);

// Route::get('/dashboard', function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
//     // return view('dashboard');
// })->middleware(['auth', 'verified']);//->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

// Auth::routes();

// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

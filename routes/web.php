<?php

use App\Livewire\Employee\AttendanceClocker;
use App\Livewire\LeaveRequestForm;
use App\Livewire\LeaveRequests;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('attendance', AttendanceClocker::class)->name('employee.attendance-clock');
    Route::get('new-leave-request', LeaveRequestForm::class)->name('employee.new-leave-request');
    Route::get('leave-request', LeaveRequests::class)->name('employee.leave-request');

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});


require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';

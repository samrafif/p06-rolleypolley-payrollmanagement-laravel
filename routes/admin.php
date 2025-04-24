<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Livewire\Admin\CompanySetting;
use App\Livewire\Admin\DepartmentsAndPositions;
use Illuminate\Support\Facades\Route;

// TODO: Implement admin middleware
Route::middleware(['auth'])->name('dashboard')->group(function () {
    Route::get('dashboard/company-settings', CompanySetting::class)->name('.config.company-settings');
    Route::get('dashboard/departments-and-positions', DepartmentsAndPositions::class)->name('.config.departments-and-positions');
});

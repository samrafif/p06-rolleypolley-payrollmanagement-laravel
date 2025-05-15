<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Livewire\Admin\Attendance;
use App\Livewire\Admin\Attendance\DateDetail;
use App\Livewire\Admin\CompanySetting;
use App\Livewire\Admin\DepartmentsAndPositions;
use App\Livewire\Admin\DepartmentsAndPositions\DepartmentDetail;
use App\Livewire\Admin\DepartmentsAndPositions\PositionDetail;
use App\Livewire\Admin\EmployeeCreationWizard;
use App\Livewire\Admin\EmployeeDetail;
use App\Livewire\Admin\Employees;
use App\Livewire\Admin\LeaveRequests;
use App\Livewire\Admin\ManageUsers;
use App\Livewire\Admin\Payrolls;
use App\Livewire\Admin\SalaryComponents;
use App\Livewire\Admin\TaxSettings;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->name('dashboard')->group(function () {
    Route::get('dashboard/company-settings', CompanySetting::class)->name('.config.company-settings');
    Route::get('dashboard/manage-departments-positions', DepartmentsAndPositions::class)->name('.config.departments-and-positions');
    Route::get('dashboard/manage-departments-positions/department/{id}', DepartmentDetail::class)->name('.config.department-detail');
    Route::get('dashboard/manage-departments-positions/department/{id}/position/{id2}', PositionDetail::class)->name('.config.position-detail');

    Route::get('dashboard/employee_detail/{id}', EmployeeDetail::class)->name('.config.employee-detail');

    // TODO: Implement the following routes
    // Route::get('dashboard/employees', PositionDetail::class)->name('.config.position-detail');
    Route::get('dashboard/tax-settings', TaxSettings::class)->name('.config.tax-settings');
    Route::get('dashboard/manage-salary-components', SalaryComponents::class)->name('.config.salary-components');
    Route::get('dashboard/manage-users', ManageUsers::class)->name('.config.manage-users');

    Route::get('dashboard/manage-employees', Employees::class)->name('.manage-employees');
    Route::get('dashboard/employee-create-wizard', EmployeeCreationWizard::class)->name('.employee-create-wizard');
    Route::get('dashboard/leave-requests', LeaveRequests::class)->name('.leave-requests');
    Route::get('dashboard/time-attendance', Attendance::class)->name('.time-attendance');
    Route::get('dashboard/time-attendance/{date}', DateDetail::class)->name('.time-attendance.date-detail');
    Route::get('dashboard/payrolls', Payrolls::class)->name('.payrolls');
});

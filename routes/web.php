<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ]
], function () {

    // Home / Dashboard
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('home');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    // Authenticated routes
    Route::middleware('auth')->group(function () {

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // School Management
        Route::resource('teachers', \App\Http\Controllers\TeacherController::class);
        Route::resource('students', \App\Http\Controllers\StudentController::class);
        Route::resource('employees', \App\Http\Controllers\EmployeeController::class);
        Route::resource('fees', \App\Http\Controllers\FeeController::class);
        Route::resource('salaries', \App\Http\Controllers\SalaryController::class);
        Route::resource('vehicles', \App\Http\Controllers\VehicleController::class);
        Route::resource('guardians', \App\Http\Controllers\GuardianController::class);
        Route::resource('classes', \App\Http\Controllers\SchoolClassController::class);
        Route::resource('subjects', \App\Http\Controllers\SubjectController::class);
        Route::resource('timetables', \App\Http\Controllers\TimetableController::class);
        Route::resource('attendances', \App\Http\Controllers\AttendanceController::class);
        Route::resource('transfers', \App\Http\Controllers\TransferController::class);
        Route::resource('expenditures', \App\Http\Controllers\ExpenditureController::class);
    });

});

// Authentication routes (DO NOT put inside localization)
require __DIR__.'/auth.php';

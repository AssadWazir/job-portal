<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApplicationController;

use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\JobListingController;
use App\Http\Controllers\Admin\ApplicationListingController;


    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/jobs/view/{id}', [JobController::class, 'show'])->name('jobs.show');


// Guest Routes
Route::middleware('guest')->group(function () {

    

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

// Auth Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/company/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/company/store', [CompanyController::class, 'store'])->name('companies.store');

    Route::get('/company/edit/{id}', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/company/update/{id}', [CompanyController::class, 'update'])->name('companies.update');

    

    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs/store', [JobController::class, 'store'])->name('jobs.store');

    Route::get('/jobs/edit/{id}', [JobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/update/{id}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/delete/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');

   // The Route to show the application form (The Page)
    Route::get('/jobs/{id}/apply', [JobController::class, 'showApplyForm'])->name('jobs.apply');

    //  The Route to handle the file upload (The Logic)
    Route::post('/jobs/{id}/apply', [ApplicationController::class, 'store'])->name('jobs.apply.store');
    
    //  The Route for Employers to see their applicants
    Route::get('/employer/applicants', [JobController::class, 'viewApplicants'])->name('employer.applicants');

    Route::post('/applications/{id}/status', [ApplicationController::class, 'updateStatus'])->name('applications.updateStatus');

});


Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
 
    Route::delete('admin/categories/destroy', [CategoryController::class, 'store'])->name('admin.categories.destroy');

    Route::get('admin/users/index', [UserController::class, 'index'])->name('admin.users.index');
    Route::delete('admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('admin/jobs/index', [JobListingController::class, 'index'])->name('admin.jobs.index');
    Route::delete('admin/jobs/{id}', [JobListingController::class, 'destroy'])->name('admin.jobs.destroy');

    Route::get('admin/applications/index', [ApplicationListingController::class, 'index'])->name('admin.applications.index');
    Route::delete('admin/applications/{id}', [ApplicationListingController::class, 'destroy'])->name('admin.applications.destroy');
});



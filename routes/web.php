<?php

use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Middleware to check if the user is authenticated and verified
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Route for Instructor Dashboard
    Route::get('Instructor/dashboard', function () {
        return view('dashboard'); // Adjust to your instructor dashboard view
    })->name('dashboard');

    // Route for Student Dashboard
    Route::get('student/dashboard', function () {
        return view('student.dashboard'); // Adjust to your student dashboard view
    })->name('student.dashboard');

    // Redirect user to their dashboard based on their role
    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('Instructor')) {
            return redirect()->route('dashboard');
        } elseif (auth()->user()->hasRole('Student')) {
            return redirect()->route('student.dashboard');
        }
        return abort(403); // Forbidden if role doesn't match
    })->name('dashboard.redirect');

    // User profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Permissions routes
    Route::get('/permissions/view', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}/update', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    // Roles routes
    Route::get('/Roles/view', [RoleController::class, 'index'])->name('Roles.index');
    Route::get('/Roles/create', [RoleController::class, 'create'])->name('Roles.create');
    Route::post('/Roles/store', [RoleController::class, 'store'])->name('Roles.store');
    Route::get('/Roles/{id}/edit', [RoleController::class, 'edit'])->name('Roles.edit');
    Route::post('/Roles/{id}/update', [RoleController::class, 'update'])->name('Roles.update');
    Route::delete('/Roles/{id}', [RoleController::class, 'destroy'])->name('Roles.destroy');

    // Users routes
    Route::get('/users/view', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
});

require __DIR__.'/auth.php';

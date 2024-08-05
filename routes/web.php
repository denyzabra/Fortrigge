<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LockScreenController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SecuritySettingController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\HousingTypesController;
use App\Http\Controllers\LandTypesController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\DocumentController;


// login Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Route(authenticated users only)
// Route::get('dashboard', function () {
//     return view('home');
// })->middleware('auth');
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard'); 
})->name('dashboard');


// Route::middleware('auth')->get('/profile', function () {
//     return view('profile'); 
// })->name('profile');
// Route::middleware('auth')->get('/lock-screen', function () {
//     return view('lock-screen'); 
// })->name('lock-screen');
// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/lock-screen', [LockScreenController::class, 'show'])->name('lock-screen');
    Route::post('/lock-screen', [LockScreenController::class, 'unlock'])->name('lock-screen.unlock');
});

Route::middleware('auth')->group(function () {
    Route::get('user-sessions', [UserSessionController::class, 'index'])->name('user-sessions.index');
});

//profile 
Route::middleware('auth')->get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::middleware('auth')->put('/profile', [ProfileController::class, 'update'])->name('profile.update');

//lock-screen
Route::middleware('auth')->get('/lock-screen', [LockScreenController::class, 'show'])->name('lock-screen');
Route::middleware('auth')->post('/lock-screen', [LockScreenController::class, 'unlock'])->name('lock-screen.unlock');

// User Management Routes
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Role Management Routes
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

// Permission Management Routes
Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

//Security settings Routes
Route::middleware('auth')->group(function () {
    Route::get('security-settings', [SecuritySettingController::class, 'index'])->name('security-setting.index');
    Route::put('security-settings', [SecuritySettingController::class, 'update'])->name('security-setting.update');
});

//property routes
Route::resource('properties', PropertyController::class);
Route::resource('housing_types', HousingTypesController::class);
Route::resource('land_types', LandTypesController::class);

// Route::resource('tenants', TenantController::class);
// Route::resource('leases', LeaseController::class);
// Route::resource('service-providers', ServiceProviderController::class);

// Route::resource('documents', DocumentController::class);

// Tenants Routes
// Tenants Routes
Route::prefix('tenants')->name('tenants.')->group(function () {
    Route::get('/', [TenantController::class, 'index'])->name('index');
    Route::get('create', [TenantController::class, 'create'])->name('create');
    Route::post('/', [TenantController::class, 'store'])->name('store');
    Route::get('{tenant}', [TenantController::class, 'show'])->name('show');
    Route::get('{tenant}/edit', [TenantController::class, 'edit'])->name('edit');
    Route::put('{tenant}', [TenantController::class, 'update'])->name('update');
    Route::delete('{tenant}', [TenantController::class, 'destroy'])->name('destroy');
});


// Leases Routes
Route::prefix('leases')->name('leases.')->group(function () {
    Route::get('/', [LeaseController::class, 'index'])->name('index');
    Route::get('create', [LeaseController::class, 'create'])->name('create');
    Route::post('/', [LeaseController::class, 'store'])->name('store');
    Route::get('{lease}', [LeaseController::class, 'show'])->name('show');
    Route::get('{lease}/edit', [LeaseController::class, 'edit'])->name('edit');
    Route::put('{lease}', [LeaseController::class, 'update'])->name('update');
    Route::delete('{lease}', [LeaseController::class, 'destroy'])->name('destroy');
});

// Maintenance Requests Routes
Route::prefix('maintenance')->name('maintenance.')->group(function () {
    Route::get('/', [MaintenanceController::class, 'index'])->name('index');
    Route::get('tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::post('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
});

// Service Providers Routes
Route::prefix('service-providers')->name('service-providers.')->group(function () {
    Route::get('/', [ServiceProviderController::class, 'index'])->name('index');
    Route::get('{type}', [ServiceProviderController::class, 'index'])->name('indexByType');
});

// Documents Routes
Route::prefix('documents')->name('documents.')->group(function () {
    Route::get('/', [DocumentController::class, 'index'])->name('index');
    Route::post('/', [DocumentController::class, 'store'])->name('store');
    Route::get('create', [DocumentController::class, 'create'])->name('create');
    Route::get('{document}', [DocumentController::class, 'show'])->name('show');
    Route::delete('{document}', [DocumentController::class, 'destroy'])->name('destroy');
});

Route::get('/dashboard', [PropertyController::class, 'dashboard'])->name('dashboard');








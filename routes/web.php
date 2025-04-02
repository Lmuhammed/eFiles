<?php

use App\Http\Controllers\CorrespondenceController;
use App\Http\Controllers\CorrespondenceDepartmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdminManagerMiddleware;
use Illuminate\Support\Facades\Route;




// auth
Auth::routes();

Route::middleware(['guest'])->group(function () { Route::get('/', function () { return view('home'); }); });

Route::middleware(['auth'])->group(function () {

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware([IsAdminManagerMiddleware::class])->group(function () {
// departments
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('/departments/{department}', [DepartmentController::class, 'update'])->name('departments.update');
Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

// departments correspondences
Route::get('/dp_cor/{correspondence}/grant-access', [CorrespondenceDepartmentController::class, 'grantAccessView'])->name("dp_cor_grantAccessView");
Route::post('/dp_cor/{correspondence}/grant-access', [CorrespondenceDepartmentController::class, 'grantAccess'])->name("dp_cor_grantAccess");
Route::delete('/dp_cor/{correspondence}/{departmentId}/revoke-access', [CorrespondenceDepartmentController::class, 'revokeAccess'])->name("dp_cor_revokeAccess");
// files
Route::get('files/create/{correspondence}',[FileController::class, 'create'])->name('files.create');
Route::post('files/{correspondence}',[FileController::class, 'store'])->name('files.store');
Route::delete('files/{file}',[FileController::class, 'destroy'])->name('files.destroy');

// correspondences
Route::get('/correspondences', [CorrespondenceController::class, 'index'])->name('correspondences.index');
Route::get('/correspondences/create', [CorrespondenceController::class, 'create'])->name('correspondences.create');
Route::post('/correspondences', [CorrespondenceController::class, 'store'])->name('correspondences.store');
Route::get('/correspondences/Sent', [CorrespondenceController::class, 'sent'])->name('correspondences.sent');//Get sent correspondences
Route::get('/correspondences/search', [CorrespondenceController::class, 'search'])->name('correspondences.search');
Route::get('/correspondences/{correspondence}/edit', [CorrespondenceController::class, 'edit'])->name('correspondences.edit');
Route::put('/correspondences/{correspondence}', [CorrespondenceController::class, 'update'])->name('correspondences.update');
Route::delete('/correspondences/{correspondence}', [CorrespondenceController::class, 'destroy'])->name('correspondences.destroy');

//Users
Route::get('users', [UserController::class, 'all'])->name('users.index');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('activate/{user}', [UserController::class, 'activate'])->name('users.activate');
Route::post('disactivate/{user}', [UserController::class, 'disactivate'])->name('users.disactivate');
});

Route::get('/correspondences/Received', [CorrespondenceController::class, 'received'])->name('correspondences.received');//Get Received correspondences
Route::get('/correspondences/{correspondence}', [CorrespondenceController::class, 'show'])->name('correspondences.show');
Route::get('/dp_cor/approve/{correspondence}', [CorrespondenceDepartmentController::class, 'approveView'])->name("approveView");
Route::post('/dp_cor/{correspondence}/approve', [CorrespondenceDepartmentController::class, 'approve'])->name("dp_cor_approve");
Route::delete('/dp_cor/{correspondence}/{departmentId}/revoke-approval', [CorrespondenceDepartmentController::class, 'revokeApproval'])->name("dp_cor_revokeApproval");
// Route::post('/sync', [DepartmentFileController::class, 'sync'])->name('d_f.sync'); maybe later



});

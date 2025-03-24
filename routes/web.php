<?php

use App\Http\Controllers\CorrespondenceController;
use App\Http\Controllers\CorrespondenceDepartmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


// auth
Auth::routes();

Route::get('/', function () { return view('home'); });
Route::get('/home', [HomeController::class, 'index'])->name('home');

// departments
//Route::resource('departments', DepartmentController::class);
Route::get('/departments', [DepartmentController::class, 'getAllDepartments'])->name('departments.index');
Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('/departments/{id}', [DepartmentController::class, 'show'])->name('departments.show');
Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');
Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

// files
Route::get('files/create/{correspondence}',[FileController::class, 'create'])->name('files.create');
Route::post('files/{correspondence}',[FileController::class, 'store'])->name('files.store');
Route::delete('files/{file}',[FileController::class, 'destroy'])->name('files.destroy');

// correspondences
//Route::resource('correspondences', CorrespondenceController::class);
Route::get('/correspondences', [CorrespondenceController::class, 'index'])->name('correspondences.index');
Route::get('/correspondences/create', [CorrespondenceController::class, 'create'])->name('correspondences.create');
Route::post('/correspondences', [CorrespondenceController::class, 'store'])->name('correspondences.store');
Route::get('/correspondences/{correspondence}', [CorrespondenceController::class, 'show'])->name('correspondences.show');
Route::get('/correspondences/{correspondence}/edit', [CorrespondenceController::class, 'edit'])->name('correspondences.edit');
Route::put('/correspondences/{correspondence}', [CorrespondenceController::class, 'update'])->name('correspondences.update');
Route::delete('/correspondences/{correspondence}', [CorrespondenceController::class, 'destroy'])->name('correspondences.destroy');
//Get sent and Received correspondences
Route::get('Sent/correspondences', [CorrespondenceController::class, 'sent'])->name('correspondences.sent');
Route::get('Received/correspondences', [CorrespondenceController::class, 'received'])->name('correspondences.received');

// departments correspondences
Route::prefix('dp_cor')->group(function () {
    Route::get('/{correspondence}/grant-access', [CorrespondenceDepartmentController::class, 'grantAccessView'])
    ->name("dp_cor_grantAccessView");
    Route::post('/{correspondence}/grant-access', [CorrespondenceDepartmentController::class, 'grantAccess'])
    ->name("dp_cor_grantAccess");
    Route::delete('/{correspondence}/{departmentId}/revoke-access', [CorrespondenceDepartmentController::class, 'revokeAccess'])
    ->name("dp_cor_revokeAccess");
    Route::post('/{correspondence}/approve', [CorrespondenceDepartmentController::class, 'approve'])
    ->name("dp_cor_approve");
    Route::delete('/{correspondence}/{departmentId}/revoke-approval', [CorrespondenceDepartmentController::class, 'revokeApproval'])
    ->name("dp_cor_revokeApproval");
});
    // Route::post('/sync', [DepartmentFileController::class, 'sync'])->name('d_f.sync'); maybe later

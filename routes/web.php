<?php

use App\Http\Controllers\CorrespondenceController;
use App\Http\Controllers\CorrespondenceDepartmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('home'); });
// auth
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// departments
Route::resource('departments', DepartmentController::class);

// files
Route::get('files/create/{correspondence}',[FileController::class, 'create'])->name('files.create');
Route::post('files/{correspondence}',[FileController::class, 'store'])->name('files.store');
Route::delete('files/{file}',[FileController::class, 'destroy'])->name('files.destroy');

// correspondences
Route::resource('correspondences', CorrespondenceController::class);
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
    // Route::post('/sync', [DepartmentFileController::class, 'sync'])->name('d_f.sync'); maybe later
});
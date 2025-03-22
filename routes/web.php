<?php

use App\Http\Controllers\CorrespondenceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentFileController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
     return view('home');
});

//Route::resource('files', FileController::class)->except('store'); //->middleware('auth');

Route::get('files/create/{correspondence}',[FileController::class, 'create'])->name('files.create');
Route::post('files/{correspondence}',[FileController::class, 'store'])->name('files.store');

/* Route::get('sent-files', [FileController::class, 'sent'])->name('files.sent');
Route::get('received-files', [FileController::class, 'received'])->name('files.received'); */


// Routes for DepartmentFileController
Route::prefix('department_file')->group(function () {

    Route::get('/{file}/grant-access', [DepartmentFileController::class, 'grantAccessView'])->name("dp_file_grantAccessView");
    Route::post('/{file}/grant-access', [DepartmentFileController::class, 'grantAccess'])->name("dp_file_grantAccess");
    Route::delete('/{file}/{departmentId}/revoke-access', [DepartmentFileController::class, 'revokeAccess'])->name("dp_file_revokeAccess");
    Route::get('/{file}/approveFile', [DepartmentFileController::class, 'approveFileView'])->name("dp_file_approveFileView");
    Route::post('/{file}/{departmentId}/approve', [DepartmentFileController::class, 'approveFile'])->name("dp_file_approveFile");
    Route::delete('/{file}/{departmentId}/revoke-approval', [DepartmentFileController::class, 'revokeApproval'])->name("dp_file_revokeApproval");
    // Route::post('/sync', [DepartmentFileController::class, 'sync'])->name('d_f.sync'); maybe later

});


Route::get('/dashboard', function () {
    return redirect()->route('files.index');
})->name('dashboard');

Route::resource('departments', DepartmentController::class);
Route::resource('correspondences', CorrespondenceController::class);
Route::get('Sent/correspondences', [CorrespondenceController::class, 'sent'])->name('correspondences.sent');
Route::get('Received/correspondences', [CorrespondenceController::class, 'received'])->name('correspondences.received');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

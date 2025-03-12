<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentFileController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    $response = "Welcome to Laravel! Here are two links:<br> ";
    $response .= '<a href="/login">Login</a> | ';
    $response .= '<a href="/register">Register</a>';

    return response($response)
        ->header('Content-Type', 'text/html');
});

Route::resource('files', FileController::class); //->middleware('auth');
Route::get('sent-files', [FileController::class, 'sent'])->name('files.sent');
Route::get('received-files', [FileController::class, 'received'])->name('files.received');


// Routes for DepartmentFileController
Route::prefix('department_file')->group(function () {
    Route::get('/attach/{file}/', [DepartmentFileController::class, 'attach_view'])->name('d_f_get.attach');
    Route::get('/attach', [DepartmentFileController::class, 'attach'])->name('d_f.attach');
    Route::post('/attach', [DepartmentFileController::class, 'attach'])->name('d_f.attach');
    Route::delete('/detach/{fileId}/{departmentId}', [DepartmentFileController::class, 'detach'])->name('d_f.detach');
    // Route::post('/sync', [DepartmentFileController::class, 'sync'])->name('d_f.sync'); maybe later

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('files.index');
    })->name('dashboard');

});


Route::resource('departments', DepartmentController::class);

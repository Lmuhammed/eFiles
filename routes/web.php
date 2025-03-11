<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect()->route('files.index');
});

Route::resource('files', FileController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::resource('departments', DepartmentController::class);
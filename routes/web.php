<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    $response = "Welcome to Laravel! Here are two links:<br> ";
    $response .= '<a href="/login">Login</a> | ';
    $response .= '<a href="/register">Register</a>';

    return response($response)
        ->header('Content-Type', 'text/html');
     
        });

Route::resource('files', FileController::class);

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

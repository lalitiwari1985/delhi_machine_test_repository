<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employees', EmployeeController::class);

Route::get('comma-separated-value', [EmployeeController::class, 'getCommaSeparatedValue'])->name('getCommaSeparatedValue');

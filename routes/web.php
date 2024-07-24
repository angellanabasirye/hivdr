<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home_test');
    // return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('patients', App\Http\Controllers\PatientController::class);
Route::resource('eligible_samples', App\Http\Controllers\EligibleSampleController::class);
Route::resource('drug_resistance', App\Http\Controllers\DrugResistanceController::class);

require __DIR__.'/auth.php';

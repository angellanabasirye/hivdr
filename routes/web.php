<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
    // return view('welcome');
});

Route::get('/dash', function () {
    return view('dash');
})->name('dash');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::resource('patients', App\Http\Controllers\PatientController::class);
    Route::resource('eligible_samples', App\Http\Controllers\EligibleSampleController::class);
    Route::resource('batches', App\Http\Controllers\BatchController::class);
    Route::resource('patient_regimens', App\Http\Controllers\PatientRegimenController::class);
    Route::resource('drug_resistance', App\Http\Controllers\DrugResistanceController::class);
    Route::get('/drug_resistance/status/{status}', [App\Http\Controllers\DrugResistanceController::class, 'index']);
    Route::resource('assessments', App\Http\Controllers\AssessmentController::class);
    Route::get('/referrals_deferrals/{status}', [App\Http\Controllers\EligibleSampleController::class, 'referrals_deferrals']);
    Route::get('/discussed', [App\Http\Controllers\DrugResistanceController::class, 'discussed']);
});

require __DIR__.'/auth.php';

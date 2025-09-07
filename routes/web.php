<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GradeController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Dashboard hanya bisa diakses user yang sudah login & terverifikasi
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Aktifkan profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource routes untuk manajemen data
    Route::resources([
        'classes'  => SchoolClassController::class,
        'students' => StudentController::class,
        'subjects' => SubjectController::class,
        'grades'   => GradeController::class,
    ]);
});

require __DIR__.'/auth.php';

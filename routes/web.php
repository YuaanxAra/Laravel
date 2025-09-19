<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;

// Dashboard hanya bisa diakses user yang sudah login & terverifikasi
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Resource routes untuk semua data
Route::middleware('auth')->group(function () {
    Route::resources([
        'books'        => BookController::class,
        'grades'       => GradeController::class,
        // 'posts'        => PostController::class,
        'classes'      => SchoolClassController::class,
        'students'     => StudentController::class,
        'subjects'     => SubjectController::class,
    ]);

    // Routes untuk profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

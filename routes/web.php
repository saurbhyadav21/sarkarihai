<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
Route::get('/', [JobController::class, 'landing'])->name('landing'); // Landing page


Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
Route::post('/job/store', [JobController::class, 'store'])->name('job.store');


Route::get('/sarkari-naukri', [JobController::class, 'index'])->name('jobs.index'); // List all jobs
Route::get('/sarkari-naukri/{slug}', [JobController::class, 'show'])->name('job.show'); // Show single job

Route::get('/test/env', function () {
    dd(env('DB_DATABASE')); // Dump 'db' variable value one by one
});
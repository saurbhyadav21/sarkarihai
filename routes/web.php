<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
Route::get('/', [JobController::class, 'landing'])->name('landing'); // Landing page
Route::get('/contact', [JobController::class, 'contact'])->name('contact'); // Landing page
Route::get('/privacy-policy', [JobController::class, 'privacy'])->name('privacy'); // Landing page
Route::get('/disclaimer', [JobController::class, 'disclaimer'])->name('disclaimer'); // Landing page
Route::get('/fact-checking-policy', [JobController::class, 'policy'])->name('policy'); // Landing page


Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
Route::post('/job/store', [JobController::class, 'store'])->name('job.store');


Route::get('/sarkari-naukri', [JobController::class, 'index'])->name('jobs.index'); // List all jobs
Route::get('/sarkari-naukri/{slug}', [JobController::class, 'show'])->name('job.show'); // Show single job

Route::get('/job/{id}/edit', [JobController::class, 'edit'])->name('job.edit');
Route::post('/job/{id}/update', [JobController::class, 'update'])->name('job.update');
Route::get('/job/edit-list', [JobController::class, 'editList'])->name('job.edit.list');


Route::get('/add-job', function () {
    return view('jobs/add-job');
});

Route::post('/add-job', [JobController::class, 'storeJson'])->name('job.store.json');


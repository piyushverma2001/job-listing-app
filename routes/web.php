<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function () {
    $jobs = Job::with('user')->get();
    return view('jobs', compact('jobs'));
})->name('jobs.index');

Route::get('/jobs/{id}', function ($id) {
    $job = Job::with('user')->findOrFail($id);
    return view('job', compact('job'));
})->name('jobs.show');

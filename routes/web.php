<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/announcement', function () {
        return view('announcement');
    })->name('announcement');
    
    Route::get('/enrollment', function () {
        return view('enrollment');
    })->name('enrollment');
    
    Route::get('/courses', function () {
        return view('courses');
    })->name('courses');
    
    Route::get('/schedule', function () {
        return view('schedule');
    })->name('schedule');
    
    Route::get('/grades', function () {
        $selectedGrade = request('grade', Auth::user()->grade_level);
        
        $grades = Auth::user()->isOldStudent() && Auth::user()->has_subjects 
            ? \App\Models\Grade::where('user_id', Auth::id())
                ->where('grade_level', $selectedGrade)
                ->get() 
            : collect();
            
        return view('grades', compact('grades', 'selectedGrade'));
    })->name('grades');
});

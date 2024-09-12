<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamAttemptController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\HomeController;




Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', HomeController::class)->name('home');
    Route::resource('/questions', QuestionController::class);
    Route::resource('/feedbacks', FeedbackController::class)->only(
        ['index', 'show']
    );
    Route::get('/courses/archive', [CourseController::class, 'archive'])->name('courses.archive');
    Route::post('/courses/{course}/restore', [CourseController::class, 'restore'])->name('courses.restore');
    Route::delete('/courses/{course}/forceDelete', [CourseController::class, 'forceDelete'])->name('courses.forceDelete');
    Route::resource('/courses', CourseController::class);
    Route::get('/levels/archive', [LevelController::class, 'archive'])->name('levels.archive');
    Route::post('/levels/{level}/restore', [LevelController::class, 'restore'])->name('levels.restore');
    Route::delete('/levels/{level}/forceDelete', [LevelController::class, 'forceDelete'])->name('levels.forceDelete');
    Route::resource('/levels', LevelController::class);
    Route::resource('/exams', ExamController::class);
});

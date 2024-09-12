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
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\FacultyController;




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
    Route::resource('/exams', ExamController::class);
    Route::resource('/universities', UniversityController::class)->where(['university' => '[0-9]+']);
    Route::get('/universities/archive', [UniversityController::class, 'archive'])->name('universities.archive');
    Route::post('/universities/{university}/restore', [UniversityController::class, 'restore'])->name('universities.restore');
    Route::delete('/universities/{university}/forceDelete', [UniversityController::class, 'forceDelete'])->name('universities.forceDelete');
    Route::resource('/faculties', FacultyController::class)->where(['faculty' => '[0-9]+']);
    Route::get('/faculties/archive', [FacultyController::class, 'archive'])->name('faculties.archive');
    Route::post('/faculties/{faculty}/restore', [FacultyController::class, 'restore'])->name('faculties.restore');
    Route::delete('/faculties/{faculty}/forceDelete', [FacultyController::class, 'forceDelete'])->name('faculties.forceDelete');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExamAttemptController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\FacultyController;




Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', HomeController::class)->name('home');
    Route::resource('/exams', ExamController::class);
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
    Route::resource('/universities', UniversityController::class)->where(['university' => '[0-9]+']);
    Route::get('/universities/archive', [UniversityController::class, 'archive'])->name('universities.archive');
    Route::post('/universities/{university}/restore', [UniversityController::class, 'restore'])->name('universities.restore');
    Route::delete('/universities/{university}/forceDelete', [UniversityController::class, 'forceDelete'])->name('universities.forceDelete');
    Route::resource('/faculties', FacultyController::class)->where(['faculty' => '[0-9]+']);
    Route::get('/faculties/archive', [FacultyController::class, 'archive'])->name('faculties.archive');
    Route::post('/faculties/{faculty}/restore', [FacultyController::class, 'restore'])->name('faculties.restore');
    Route::delete('/faculties/{faculty}/forceDelete', [FacultyController::class, 'forceDelete'])->name('faculties.forceDelete');
    Route::resource('/majors', MajorController::class)->where(['major' => '[0-9]+']);
    Route::get('/majors/archive', [MajorController::class, 'archive'])->name('majors.archive');
    Route::post('/majors/{major}/restore', [MajorController::class, 'restore'])->name('majors.restore');
    Route::delete('/majors/{major}/forceDelete', [MajorController::class, 'forceDelete'])->name('majors.forceDelete');
});

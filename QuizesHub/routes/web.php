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
    Route::resource('/courses', CourseController::class);
    

});

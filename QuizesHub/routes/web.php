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
    Route::get('/feedbacks/archive', [FeedbackController::class, 'archive'])->name('feedbacks.archive');
    Route::resource('/questions', QuestionController::class);
    Route::resource('/exams', ExamController::class);
    Route::resource('/feedbacks', FeedbackController::class);
});

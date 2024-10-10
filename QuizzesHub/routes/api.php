<?php

use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Admin\UniversityController;
use App\Http\Controllers\Api\Admin\FacultyController;
use App\Http\Controllers\Api\Admin\MajorController;
use App\Http\Controllers\Api\Admin\LevelController;
use App\Http\Controllers\Api\Admin\FeedbackController;
use App\Http\Controllers\Api\Admin\CourseController;
use App\Http\Controllers\Api\Admin\ExamController;
use App\Http\Controllers\Api\Admin\ChartController;
use App\Http\Controllers\Api\Auth\AuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/universities', UniversityController::class);
    Route::apiResource('/faculties', FacultyController::class);
    Route::apiResource('/majors', MajorController::class);
    Route::apiResource('/levels', LevelController::class);
    Route::apiResource('/feedbacks', FeedbackController::class);
    Route::apiResource('/courses', CourseController::class);
    Route::apiResource('/exams', ExamController::class);

    Route::get('/charts/most-universities', [ChartController::class, 'getMostUniversities']);
    Route::get('/top-users-data', [ChartController::class, 'getTopUsersByScore']);
    Route::get('/popular-courses-data', [ChartController::class, 'getMostPopularCourses']);

    Route::post('logout', [AuthController::class, 'logout']);
});


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);



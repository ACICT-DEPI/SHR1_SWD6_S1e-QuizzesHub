<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function() {
    Route::resource('questions', QuestionController::class);
});


Route::get('/admin/exams', [ExamController::class, 'index']);
Route::get('/admin/exams', [ExamController::class, 'index']);


Route::prefix('/admin')->group(function() {
    Route::get('/exams', [ExamController::class, 'index'])->name('exams.index');
    
    Route::get('/exams/create', [ExamController::class, 'create'])->name('exams.create');
    
    Route::get('/exams/archive', [ExamController::class, 'archive'])->name('exams.archive');
    
    Route::post('/exams', [ExamController::class, 'store'])->name('exams.store');
    
    Route::get('/exams/{employee}', [ExamController::class, 'show'])->name('exams.show');
    
    Route::get('/exams/{employee}/edit', [ExamController::class, 'edit'])->name('exams.edit');
    
    Route::put('/exams/{employee}', [ExamController::class, 'update'])->name('exams.update');
    
    Route::delete('/exams/{employee}', [ExamController::class, 'destroy'])->name('exams.destroy');
    
    Route::post('/exams/{employee}/restore', [ExamController::class, 'restore'])->name('exams.restore');
    
    Route::delete('/exams/{employee}/delete', [ExamController::class, 'forceDelete'])->name('exams.forceDelete');



});




// Route::get('/admin/questions', [ExamController::class, 'index']);
Route::get('/admin/answers', [ExamController::class, 'index']);
Route::get('/admin/exams', [ExamController::class, 'index']);
Route::get('/admin/exams', [ExamController::class, 'index']);
Route::get('/admin/exams', [ExamController::class, 'index']);

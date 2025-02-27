<?php

use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\QuizController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Site\CourseExamsController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Site\NewExamController;
use App\Http\Controllers\Admin\NewExamAdminController;
use App\Http\Controllers\Site\SiteController;







Route::get('/', [SiteController::class, 'index'])->name('site.index');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('contact', [SiteController::class, 'contact'])->name('site.contact');
    Route::get('AboutUs', [SiteController::class, 'about'])->name('site.about');
    Route::get('ReadMore', [SiteController::class, 'ReadMore'])->name('site.ReadMore');


    Route::get('/newexams/create', [NewExamController::class, 'create'])->name('newexams.create');
    Route::post('/newexams', [NewExamController::class, 'store'])->name('newexams.store');

});

Route::middleware(['auth', 'verified', 'IsAuthorized'])->group(function () {

    Route::get('CourseExams/{course}', [CourseExamsController::class, 'CourseExams'])->name('CourseExams')->withoutMiddleware('IsAuthorized')->middleware('IsAuthorized2');

    Route::post('/quiz/{id}', [QuizController::class, 'quiz'])->name('quiz.quiz');
    Route::get('/quiz/{id}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{id}/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz/{id}/feedback', [QuizController::class, 'feedBack'])->name('quiz.feedback');
    Route::post('/quiz/{id}/feedback', [QuizController::class, 'storeFeedBack'])->name('quiz.feedback');
    
    Route::get('/quiz/{id}/submit', [QuizController::class, 'show'])->name('quiz.show1');

});

Route::middleware(['auth','IsAdmin','verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', HomeController::class)->name('home');

    Route::get('/exams/archive', [ExamController::class, 'archive'])->name('exams.archive');
    Route::get('/exams/{restore}/restore', [ExamController::class, 'restore'])->name('exams.restore')->middleware('IsOwner');
    Route::resource('/exams', ExamController::class);

    Route::resource('/questions', QuestionController::class);

    Route::resource('/feedbacks', FeedbackController::class)->only(
        ['index', 'show']
    );

    Route::get('/courses/archive', [CourseController::class, 'archive'])->name('courses.archive');
    Route::post('/courses/{course}/restore', [CourseController::class, 'restore'])->name('courses.restore')->middleware('IsOwner');
    Route::delete('/courses/{course}/forceDelete', [CourseController::class, 'forceDelete'])->name('courses.forceDelete')->middleware('IsOwner');
    Route::post('/courses/{course}', [CourseController::class, 'addCourseToMajor'])->name('courses.addCourseToMajor');
    Route::get('/courses/{course}/addToMajor',[CourseController::class, 'addToMajor'])->name('courses.addTomajor');
    Route::resource('/courses', CourseController::class);

    Route::get('/levels/archive', [LevelController::class, 'archive'])->name('levels.archive');
    Route::post('/levels/{level}/restore', [LevelController::class, 'restore'])->name('levels.restore')->middleware('IsOwner');
    Route::delete('/levels/{level}/forceDelete', [LevelController::class, 'forceDelete'])->name('levels.forceDelete')->middleware('IsOwner');
    Route::resource('/levels', LevelController::class);

    Route::resource('/universities', UniversityController::class)->where(['university' => '[0-9]+']);
    Route::get('/universities/archive', [UniversityController::class, 'archive'])->name('universities.archive');
    Route::post('/universities/{university}/restore', [UniversityController::class, 'restore'])->name('universities.restore')->middleware('IsOwner');
    Route::delete('/universities/{university}/forceDelete', [UniversityController::class, 'forceDelete'])->name('universities.forceDelete')->middleware('IsOwner');

    Route::get('/universities/{university}/faculties', [UniversityController::class, 'faculties'])->name('universities.faculties');
    Route::post('/universities/{university}/faculties', [UniversityController::class, 'addFaculties'])->name('universities.addFaculties');
    Route::delete('/universities/{university}/faculties/{faculty}', [UniversityController::class, 'removeFaculty'])->name('universities.removeFaculty');

    Route::resource('/faculties', FacultyController::class)->where(['faculty' => '[0-9]+']);
    Route::get('/faculties/archive', [FacultyController::class, 'archive'])->name('faculties.archive');
    Route::post('/faculties/{faculty}/restore', [FacultyController::class, 'restore'])->name('faculties.restore')->middleware('IsOwner');
    Route::delete('/faculties/{faculty}/forceDelete', [FacultyController::class, 'forceDelete'])->name('faculties.forceDelete')->middleware('IsOwner');

    Route::get('/faculties/{faculty}/majors', [FacultyController::class, 'majors'])->name('faculties.majors');
    Route::post('/faculties/{faculty}/majors', [FacultyController::class, 'addMajors'])->name('faculties.addMajors');
    Route::delete('/faculties/{faculty}/majors/{major}', [FacultyController::class, 'removeMajor'])->name('faculties.removeMajor');

    Route::resource('/majors', MajorController::class)->where(['major' => '[0-9]+']);
    Route::get('/majors/archive', [MajorController::class, 'archive'])->name('majors.archive');
    Route::post('/majors/{major}/restore', [MajorController::class, 'restore'])->name('majors.restore')->middleware('IsOwner');
    Route::delete('/majors/{major}/forceDelete', [MajorController::class, 'forceDelete'])->name('majors.forceDelete')->middleware('IsOwner');
    Route::resource('/users', UserController::class)->where(['user' => '[0-9]+']);
    Route::get('/users/archive', [UserController::class, 'archive'])->name('users.archive');
    Route::post('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore')->middleware('IsOwner');
    Route::delete('/users/{user}/forceDelete', [UserController::class, 'forceDelete'])->name('users.forceDelete')->middleware('IsOwner');
    Route::get('/users/{user}/editRole', [UserController::class, 'editRole'])->name('users.editRole')->middleware('IsOwner');
    Route::put('/users/{user}/updateRole', [UserController::class, 'updateRole'])->name('users.updateRole')->middleware('IsOwner');

    Route::get('/charts/most-universities', [ChartController::class, 'getMostUniversities']);
    Route::get('/top-users-data', [ChartController::class, 'getTopUsersByScore']);
    Route::get('/popular-courses-data', [ChartController::class, 'getMostPopularCourses']);

    // add new exam
    Route::get('/newexams', [NewExamAdminController::class, 'index'])->name('newexams.index');
    Route::get('/newexams/{id}', [NewExamAdminController::class, 'show'])->name('newexams.show');
    Route::delete('/newexams/{id}', [NewExamAdminController::class, 'destroy'])->name('newexams.delete');
});



require __DIR__.'/auth.php';







<?php

use App\Http\Controllers\AttendanceStudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\CheckLoginMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'processLogin'])->name('process_login');
Route::group([
    'middleware' => CheckLoginMiddleware::class,
], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        return view('layout.master');
    })->name('welcome');

    Route::get('register_ministry', [AuthController::class, 'registerMinistry'])->name('register_ministry');
    Route::post('register_ministry', [AuthController::class, 'processRegisterMinistry'])->name('process_register_ministry');

    Route::get('register_teacher', [AuthController::class, 'registerTeacher'])->name('register_teacher');
    Route::post('register_teacher', [AuthController::class, 'processRegisterTeacher'])->name('process_register_teacher');

    Route::group([
        'as'     => 'academicyears.',
        'prefix' => 'academicyears',
    ], function () {
        Route::get('/', [AcademicYearController::class, 'index'])->name('index');
        Route::get('/create', [AcademicYearController::class, 'create'])->name('create');
        Route::post('/store', [AcademicYearController::class, 'store'])->name('store');
        Route::get('/edit/{academicyear}', [AcademicYearController::class, 'edit'])->name('edit');
        Route::put('/update/{academicyear}', [AcademicYearController::class, 'update'])->name('update');
        Route::delete('/destroy/{academicyear}', [AcademicYearController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'as'     => 'majors.',
        'prefix' => 'majors',
    ], function () {
        Route::get('/', [MajorController::class, 'index'])->name('index');
        Route::get('/create', [MajorController::class, 'create'])->name('create');
        Route::post('/store', [MajorController::class, 'store'])->name('store');
        Route::get('/edit/{major}', [MajorController::class, 'edit'])->name('edit');
        Route::put('/update/{major}', [MajorController::class, 'update'])->name('update');
        Route::delete('/destroy/{major}', [MajorController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'as'     => 'subjects.',
        'prefix' => 'subjects',
    ], function () {
        Route::get('/', [SubjectController::class, 'index'])->name('index');
        Route::get('/create', [SubjectController::class, 'create'])->name('create');
        Route::post('/store', [SubjectController::class, 'store'])->name('store');
        Route::get('/edit/{subject}', [SubjectController::class, 'edit'])->name('edit');
        Route::put('/update/{subject}', [SubjectController::class, 'update'])->name('update');
        Route::delete('/destroy/{subject}', [SubjectController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'as'     => 'teachers.',
        'prefix' => 'teachers',
    ], function () {
        Route::get('/', [TeacherController::class, 'index'])->name('index');
        Route::get('/create', [TeacherController::class, 'create'])->name('create');
        Route::post('/store', [TeacherController::class, 'store'])->name('store');
        Route::get('/edit/{teacher}', [TeacherController::class, 'edit'])->name('edit');
        Route::put('/update/{teacher}', [TeacherController::class, 'update'])->name('update');
        Route::delete('/destroy/{teacher}', [TeacherController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'as'     => 'courses.',
        'prefix' => 'courses',
    ], function () {
        Route::get('/', [CourseController::class, 'index'])->name('index');
        Route::get('/create', [CourseController::class, 'create'])->name('create');
        Route::post('/store', [CourseController::class, 'store'])->name('store');
        Route::get('/edit/{course}', [CourseController::class, 'edit'])->name('edit');
        Route::put('/update/{course}', [CourseController::class, 'update'])->name('update');
        Route::delete('/destroy/{course}', [CourseController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'as'     => 'students.',
        'prefix' => 'students',
    ], function () {
        Route::get('/', [StudentController::class, 'index'])->name('index');
        Route::get('/create', [StudentController::class, 'create'])->name('create');
        Route::post('/store', [StudentController::class, 'store'])->name('store');
        Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('edit');
        Route::put('/update/{student}', [StudentController::class, 'update'])->name('update');
        Route::delete('/destroy/{student}', [StudentController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'as'     => 'lessons.',
        'prefix' => 'lessons',
    ], function () {
        Route::get('/', [LessonController::class, 'index'])->name('index');
        Route::get('/create', [LessonController::class, 'create'])->name('create');
        Route::post('/store', [LessonController::class, 'store'])->name('store');
        Route::get('/edit/{lesson}', [LessonController::class, 'edit'])->name('edit');
        Route::put('/update/{lesson}', [LessonController::class, 'update'])->name('update');
        Route::delete('/destroy/{lesson}', [LessonController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'as'     => 'attendances.',
        'prefix' => 'attendances',
    ], function () {
        Route::get('/', [AttendanceController::class, 'get'])->name('get');
        Route::post('/', [AttendanceController::class, 'index'])->name('index');
        Route::post('/attendance', [AttendanceController::class, 'attendance'])->name('attendance');
    });

    // Route::group([
    //     'as'     => 'attendance_students.',
    //     'prefix' => 'attendance_students',
    // ], function () {
    //     Route::get('/', [AttendanceStudentController::class, 'get'])->name('get');
    //     Route::post('/', [AttendanceStudentController::class, 'index'])->name('index');
    // });
});
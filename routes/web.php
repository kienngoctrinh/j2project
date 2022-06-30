<?php

use App\Http\Controllers\ClasssController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.master');
})->name('welcome');

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
    'as'     => 'classses.',
    'prefix' => 'classses',
], function () {
    Route::get('/', [ClasssController::class, 'index'])->name('index');
    Route::get('/create', [ClasssController::class, 'create'])->name('create');
    Route::post('/store', [ClasssController::class, 'store'])->name('store');
    Route::get('/edit/{classs}', [ClasssController::class, 'edit'])->name('edit');
    Route::put('/update/{classs}', [ClasssController::class, 'update'])->name('update');
    Route::delete('/destroy/{classs}', [ClasssController::class, 'destroy'])->name('destroy');
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
    'as'     => 'slots.',
    'prefix' => 'slots',
], function () {
    Route::get('/', [SlotController::class, 'index'])->name('index');
    Route::get('/create', [SlotController::class, 'create'])->name('create');
    Route::post('/store', [SlotController::class, 'store'])->name('store');
    Route::get('/edit/{slot}', [SlotController::class, 'edit'])->name('edit');
    Route::put('/update/{slot}', [SlotController::class, 'update'])->name('update');
    Route::delete('/destroy/{slot}', [SlotController::class, 'destroy'])->name('destroy');
});
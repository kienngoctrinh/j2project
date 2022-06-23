<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\MajorController;
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
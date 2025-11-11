<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectsController;
use App\Models\Subjects;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\CourseControllerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
Route::post('/students', [StudentsController::class, 'store'])->name('students.store');
Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
Route::get('/students/{id}', [StudentsController::class, 'show'])->name('students.show');
Route::get('/students/{id}/edit', [StudentsController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentsController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentsController::class, 'destroy'])->name('students.destroy');

Route::get('/subjects', [SubjectsController::class, 'index'])->name('subjects.index'); 
Route::post('/subjects', [SubjectsController::class, 'store'])->name('subjects.store');
Route::get('/subjects/create', [SubjectsController::class, 'create'])->name('subjects.create');
Route::get('/subjects/{id}/edit', [SubjectsController::class, 'edit'])->name('subjects.edit');
Route::put('/subjects/{id}', [SubjectsController::class, 'update'])->name('subjects.update');
Route::delete('/subjects/{id}', [SubjectsController::class, 'destroy'])->name('subjects.destroy');
Route::get('/subjects/{id}', [SubjectsController::class, 'show'])->name('subjects.show');


Route::get('/results', [ResultsController::class,'index'])->name('results.index');
Route::post('/results', [ResultsController::class, 'store'])->name('results.store');
Route::get('/results/{id}/edit', [ResultsController::class, 'edit'])->name('results.edit');
Route::put('/results/{id}', [ResultsController::class, 'update'])->name('results.update');
Route::delete('/results/{id}', [ResultsController::class, 'destroy'])->name('results.destroy');
Route::get('/results/create', [ResultsController::class, 'create'])->name('results.create');
Route::get('/results/{id}', [ResultsController::class, 'show'])->name('results.show');

Route::get('/course', [CourseController::class, 'index'])->name('course.index'); 
Route::post('/course', [CourseController::class, 'store'])->name('course.store');
Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.show');
Route::get('/course/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
Route::put('/course/{id}', [CourseController::class, 'update'])->name('course.update');
Route::delete('/course/{id}', [CourseController::class, 'destroy'])->name('course.destroy');


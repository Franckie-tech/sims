<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectsController;
use App\Models\Subjects;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\CourseControllerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\User;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
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

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');


});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');
});


Route::middleware(['auth', 'teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])
        ->name('teacher.dashboard');
});


Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'index'])
        ->name('student.dashboard');
});

Route::get('/student/results', [ResultsController::class, 'studentResults'])
    ->name('student.results')->middleware(['auth', 'student']);






Route::middleware(['auth'])->group(function() {
    Route::get('admin/dashboard' , [AdminController::class, 'index'])->name('admin.dashboard');


    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');


    Route::get('/student/dashboard', [StudentController ::class, 'index'])->name('student.dashboard');

    
    
});



Route::middleware(['auth'])->group(function() {
    
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});


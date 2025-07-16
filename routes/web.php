<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PayementController;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Route;


Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('courses', CourseController::class);
Route::resource('promotions', PromotionController::class);
Route::resource('enrollments', EnrollmentController::class);
Route::resource('payement',PayementController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])
      ->name('dashboard');


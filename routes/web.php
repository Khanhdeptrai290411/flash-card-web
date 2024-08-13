<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.page2');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', [CourseController::class, 'page4'])->name('home');





});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('quizz', QuizController::class);
// Trong tệp web.php
Route::get('/quizz/destroy/{id}', [QuizController::class,'delete'])->name('quizz.delete');





});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('course', CourseController::class);
    Route::get('/courses/search', [CourseController::class, 'search'])->name('course.search');
    Route::get('/courses/random/{courseId}', [CourseController::class, 'random'])->name('card.random');
    Route::get('/courses/page3', [CourseController::class, 'page3'])->name('course.page3');
    Route::get('/courses/page4', [CourseController::class, 'page4'])->name('course.page4');


});

<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'Home'])->name('home');
Route::get('/about', [UserController::class, 'About'])->name('about');
Route::get('/services', [UserController::class, 'Services'])->name('services');
Route::get('/contact', [UserController::class, 'Contact'])->name('contact');
Route::post('/parking', [UserController::class, 'Parking'])->name('parking');
Route::get('/parking/{id}', [UserController::class, 'UpdateStatus'])->name('update');
Route::get('/search', [UserController::class, 'Search'])->name('Search');
Route::get('/price', [UserController::class, 'Price'])->name('price');
Route::post('/feedback',[UserFeedbackController::class,'Feedback'])->name('feedback');
Route::get('/GetMessage',[UserFeedbackController::class,'GetMessage'])->name('message');
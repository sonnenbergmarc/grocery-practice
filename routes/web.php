<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');

// Admin

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminController::class, 'login'])->name('admin_login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin_login_submit');
    Route::get('/forget-password', [AdminController::class, 'forget_password'])->name('admin_forget_password');
    Route::post('/forget-password', [AdminController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
});
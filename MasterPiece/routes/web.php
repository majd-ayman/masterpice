<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;


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
    return view('index');
})->name('index');

Route::get('/about',function(){
    return view ('about');
})->name('about');

Route::get('/index',function(){
    return view ('index');
})->name('index');


Route::get('/service',function(){
    return view ('service');
})->name('service');


Route::get('/contact',function(){
    return view ('contact');
})->name('contact');

Route::get('/department-single',function(){
    return view ('department-single');
})->name('department-single');

Route::get('/department',function(){
    return view ('department');
})->name('department');


Route::get('/doctor',function(){
    return view ('doctor');
})->name('doctor');


Route::get('/doctor-single',function(){
    return view ('doctor-single');
})->name('doctor-single');

Route::get('/appoinment',function(){
    return view ('appoinment');
})->name('appoinment');


Route::get('/blog-sidebar',function(){
    return view ('blog-sidebar');
})->name('blog-sidebar');



Route::get('/blog-single',function(){
    return view ('blog-single');
})->name('blog-single');

// Routes for Reviews
Route::post('/reviews', [ReviewController::class, 'store']);
Route::get('/reviews/doctor/{doctorId}', [ReviewController::class, 'showReviewsByDoctor']);

Route::get('/my-account', function () {
    return view('my-account');
})->name('my-account');

//Regester and login 

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


use App\Http\Controllers\UserController;

Route::get('/my-account', [UserController::class, 'showAccount'])->name('my-account');

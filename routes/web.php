<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class , 'main']);
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/service', [PageController::class, 'service'])->name('service');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/list', [PageController::class, 'list'])->name('list');
Route::get('login', [AuthController::class,'login'])->name('login');
Route::post('authenticate', [AuthController::class,'authenticate'])->name('authenticate');
Route::get('register', [AuthController::class,'register'])->name('register');
Route::post('register', [AuthController::class,'register_store'])->name('register.store');
Route::post('logout', [AuthController::class,'logout'])->name('logout');



Route::resource('feature', FeatureController::class);
Route::resource('doctor', DoctorController::class);
Route::resource('appointment', AppointmentController::class);

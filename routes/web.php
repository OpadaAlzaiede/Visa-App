<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Visa\VisaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {

    Route::get('dashboard', [AuthController::class, 'dashboard']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('application', [VisaController::class, 'index'])->name('application');
    Route::get('start', [VisaController::class, 'start'])->name('start');
    Route::get('visas/create-step-two', [VisaController::class,'createStepTwo'])->name('visa.create.step.two');
    Route::get('visas/create-step-three', [VisaController::class,'createStepThree'])->name('visa.create.step.three');
    Route::get('visas/review', [VisaController::class,'review'])->name('visa.review');
    Route::get('visas/done', [VisaController::class,'done'])->name('visa.done');
    Route::post('application/step-one', [VisaController::class, 'stepOne'])->name('application.create.step.one.post');
    Route::post('application/step-two', [VisaController::class, 'stepTwo'])->name('application.create.step.two.post');
    Route::post('application/step-three', [VisaController::class, 'stepThree'])->name('application.create.step.three.post');
    Route::post('application/submit', [VisaController::class, 'submit'])->name('application.submit');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'login'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'register'])->name('register.post');


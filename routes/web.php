<?php

use App\Http\Controllers\AddschedulingesController;
use App\Http\Controllers\AdminarticlesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FinancialsController;
use App\Http\Controllers\FullschedulesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MinipagefinancesController;
use App\Http\Controllers\MinipageschedulesController;
use App\Http\Controllers\OutcomesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SchedulesController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('articles', ArticleController::class);
Route::resource('addschedulinges', AddschedulingesController::class);
Route::resource('admin', AdminController::class);
Route::resource('financials', FinancialsController::class);
Route::resource('incomes', IncomesController::class);
Route::resource('outcomes', OutcomesController::class);
Route::resource('minipagefinances', MinipagefinancesController::class);
Route::resource('minipageschedules', MinipageschedulesController::class);
Route::resource('schedules', SchedulesController::class);
Route::resource('fullschedules', FullschedulesController::class);

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')
        ->name('login');
    Route::post('/login', 'authenticate')
        ->name('signin');

    Route::post('/signout', 'signout')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'show')
        ->name('register');
    Route::post('/signup', 'regist')
        ->name('signup');
});

Route::controller(AdminarticlesController::class)->group(function () {
    Route::get('/adminarticles', 'show')
        ->name('addarticles');
    Route::post('/adminarticles', 'add')
        ->name('addarticle');
});

// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login', [LoginController::class, 'authenticate'])->name('signin');
// Route::post('/signout', [LoginController::class, 'signout'])->name('logout');
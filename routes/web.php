<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TpollController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;

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

Route::controller(HomeController::class)->group(function () {
    // Route::get('/', 'auswahl')->name('home.auswahl');
    Route::get('/cookies', 'cookies')->name('home.cookies');
    Route::get('/datenschutz', 'datenschutz')->name('home.datenschutz');
    Route::get('/', 'auswahl')->name('home.index');
});

Route::resource('/tpolls', TpollController::class);

Route::resource('/members',MemberController::class);
Route::resource('/events',EventController::class);

Route::get('/dashboard', [TpollController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'is_authenticate'], function() {
    Route::get('/', [ContactController::class, 'index'])->name('home');

    // contact.create
    Route::prefix('contact')->group(function () {
        Route::get('/create', [ContactController::class, 'create'])->name('contact.create');
        Route::get('/search/{search?}', [ContactController::class, 'search'])->name('contact.search');
        Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
        Route::get('/destroy/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
        
        Route::post('/store', [ContactController::class, 'store'])->name('contact.store');
        Route::post('/update', [ContactController::class, 'update'])->name('contact.update');
    });
});

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('/authenticate', [UserController::class, 'authenticate'])->name('authenticate');
Route::post('/user/create', [UserController::class, 'create'])->name('user.create');
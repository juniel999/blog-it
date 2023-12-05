<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::prefix('settings')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::patch('/profile/picture', [ProfileController::class, 'upload_image'])->name('profile.upload.image');
    });

    Route::post('users/follow/{user}', [UserController::class, 'follow_user'])->name('users.follow');
    Route::resource('users', UserController::class);

    Route::post('posts/likes/add_like/{post}', [PostController::class, 'add_like'])->name('posts.add-like');
    Route::resource('posts', PostController::class);
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::prefix('settings')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::patch('/profile/picture', [ProfileController::class, 'upload_image'])->name('profile.upload.image');
    });

    //users
    Route::get('users/notifications', [UserController::class, 'notifications'])->name('users.notifications');
    Route::post('users/unread_notification/{notification_id}', [UserController::class, 'unread_notification'])->name('users.unread-notification');
    Route::post('users/follow/{user}', [UserController::class, 'follow_user'])->name('users.follow');
    Route::get('users/followers/{user}/all', [UserController::class, 'followers'])->name('users.followers');
    Route::resource('users', UserController::class);

    //posts
    Route::post('posts/likes/add_like/{post}', [PostController::class, 'add_like'])->name('posts.add-like');
    Route::resource('posts', PostController::class);

    //comments
    Route::resource('posts.comments', CommentController::class);
});

require __DIR__.'/auth.php';

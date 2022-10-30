<?php

use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();


Route::get('', function () {
    return redirect('/posts/');
});



Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::post('posts/ajax', [PostController::class, 'restore'])->name('posts.restore');
    Route::get('posts/ajax/{id}', [PostController::class, 'showJSON'])->name('posts.showJSON');
});

Route::post('comments/{id}', [CommentController::class, 'store'])->name('comments.store');
Route::put('comments/{id}/{postID}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('comments/{id}/{postID}', [CommentController::class, 'destroy'])->name('comments.destroy');


Route::get('/auth/redirect', [SocialAuthController::class, 'githubRedirect'])->name('github.login');
Route::get('/auth/callback', [SocialAuthController::class, 'githubCallback']);
Route::get('/auth/google/redirect', [SocialAuthController::class, 'googleRedirect'])->name('google.login');
Route::get('/auth/google/callback', [SocialAuthController::class, 'googleCallback']);

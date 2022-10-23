<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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

Route::get('', function () {
    return redirect('/posts/');
});

Route::resource('posts', PostController::class);

Route::post('comments/{id}', [CommentController::class,'store'])->name('comments.store');
Route::put('comments/{id}/{postID}', [CommentController::class,'update'])->name('comments.update');
Route::delete('comments/{id}/{postID}', [CommentController::class,'destroy'])->name('comments.destroy');


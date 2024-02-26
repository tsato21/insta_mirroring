<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Symfony\Component\HttpKernel\Profiler\Profile;

use App\Http\Controllers\admin\UsersController;



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

Route::group(['middleware' => 'auth'], function () {
    // Show index page
    Route::get('/', [HomeController::class, 'indexFollowing'])->name('home');
    Route::get('/show/all', [HomeController::class, 'indexAll'] )->name('show.all');
    
    // Show create post page
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    // Store post
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    //Show post page
    Route::get('/post/{id}/show', [PostController::class, 'show'])->name('post.show');
    //Update post
    Route::patch('/post/{id}/update',[PostController::class, 'update'])->name('post.update');
    //Delete post
    Route::delete('/post/{id}/delete', [PostController::class, 'destroy'])->name('post.delete');

    //Create comment
    Route::get('comment/{id}', [CommentController::class, 'store'])->name('comment.create');
    //Delete comment
    Route::delete('comment/{id}/delete', [CommentController::class, 'destroy'])->name('comment.delete');

    //Create like
    Route::get('/like/{id}', [LikeController::class, 'store'])->name('like.create');
    Route::delete('/like/{id}', [LikeController::class, 'destroy'])->name('like.delete');

    //Show Following
    Route::get('following/{id}', [ProfileController::class, 'following'])->name('following');
    Route::get('followers/{id}', [ProfileController::class, 'followers'])->name('followers');
    
    //Follow and Unfollow
    Route::get('/follow/{id}', [FollowController::class, 'store'])->name('follow');
    Route::delete('/unfollow/{id}', [FollowController::class, 'destroy'])->name('unfollow');

    // Show profile page
    Route::get('/profile/{id}/show', [ProfileController::class, 'show'])->name('profile.show');
    //Update profile
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::group(['prefix'=>'admin', 'as'=>('admin.'), 'middleware'=>'admin'], function(){
        Route::get('/index', [HomeController::class, 'indexFollowing'])->name('home');

        //Show all users
        Route::get('/users', [UsersController::class, 'index'])->name('users.index');
        //Deactivate a user
        Route::delete('/users/deactivate/{id}', [UsersController::class, 'deactivate'])->name('deactivate');
        Route::get('users/activate/{id}', [UsersController::class, 'activate'])->name('activate');
    });

});
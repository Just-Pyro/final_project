<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
// use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

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
    $posts = [];
    if (auth()->check()){

        $posts = Post::where('user_id', auth()->id())->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//User Blog Posts Routes
Route::post('/createPost', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditPost']);
Route::put('/edit-post/{post}', [PostController::class, 'updatedPost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);// wa daw labot

//All Users Blog Posts
Route::get('/show-all-post', function() {
    $posts = Post::latest()->get();
    return view('show-all-post', ['posts' => $posts]);
});

//Blog Comments
Route::post('/show-all-post/{post}', [CommentController::class, 'createComment']);
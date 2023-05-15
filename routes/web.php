<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::patch('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::group(['middleware' => ['auth', 'verified', 'is_admin']], function () {
    Route::get('/users', [ProfileController::class, 'index'])->name('users.index');
});

Route::get('/users/{id}', [ProfileController::class, 'show'])->name('users.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function() {
        if(auth()->user()->is_admin)
        {
            return view('admin.dashboard');
        }
        else
        {
            return view('dashboard');
        }
    })->name('dashboard');
});

require __DIR__.'/auth.php';

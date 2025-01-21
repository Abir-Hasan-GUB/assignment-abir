<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', function () {

    $categories = Category::all();
    $posts = Post::with(['user', 'category', 'comments'])
        ->where('user_id', Auth::id())
        ->orderBy('id', 'desc')
        ->paginate(5);

    return view('dashboard', compact('categories', 'posts'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Custom Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class)->except(['index', 'show']);
    Route::resource('comments', CommentController::class)->except(['index', 'show', 'store']);
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');  // Define the post comment store route
});
// Route for filtering posts by category
Route::get('/posts/filter', [PostController::class, 'filterByCategory'])->name('posts.filter');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


require __DIR__ . '/auth.php';

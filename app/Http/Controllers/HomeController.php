<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = Post::with(['user', 'category', 'comments'])->paginate(10);
        $categories = Category::all();
        return view('pages.home.index', compact('posts', 'categories'));
    }
}

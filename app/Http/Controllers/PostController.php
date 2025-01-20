<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Post::class, 'post');
    }

    public function index() {}

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $request->user()->posts()->create($validated);
        session()->flash('success', 'Data saved successfully!');
        return redirect()->back()->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        $post->load(['comments.user', 'category', 'user']);
        return view('pages.post_details.view', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    public function filterByCategory(Request $request)
    {
        $categories = Category::all();

        // If a category is selected, filter by that category
        if ($request->category) {
            $category = Category::findOrFail($request->category);
            $posts = $category->posts()->with(['user', 'category', 'comments'])->paginate(10);
        } else {
            // If no category is selected, show all posts
            $posts = Post::with(['user', 'category', 'comments'])->paginate(10);
        }

        return view('pages.home.index', compact('posts', 'categories'));
    }
}

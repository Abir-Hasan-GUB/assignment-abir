<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:500',
        ]);

        $post->comments()->create([
            'body' => $validated['body'],
            'user_id' => $request->user()->id,
            'post_id' => $post->id,
        ]);
        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:500',
        ]);

        $comment->update($validated);

        return redirect()->route('posts.show', $comment->post)->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}

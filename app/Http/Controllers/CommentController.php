<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //   Apply authorization policies to Comment resource.
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }


    // Store a newly created comment in storage.
    public function store(Request $request, Post $post)
    {
        // Validate the input data
        $validated = $request->validate([
            'body' => 'required|string|max:500',
        ]);

        // Create a new comment with the authenticated user
        $post->comments()->create([
            'body' => $validated['body'],
            'user_id' => $request->user()->id,
            'post_id' => $post->id,
        ]);
        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment')); // return specific comment to show for edit
    }

    public function update(Request $request, Comment $comment)
    {
        // Validate the input data
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

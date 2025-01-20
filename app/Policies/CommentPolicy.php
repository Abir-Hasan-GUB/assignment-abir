<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    public function viewAny(User $user)
    {
        return true; // Allow all authenticated users
    }

    public function view(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }

    public function create(User $user)
    {
        return true; // Allow all authenticated users
    }

    public function update(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }

    public function delete(User $user, Comment $comment)
    {
        // Allow if the user is the comment author
        if ($user->id === $comment->user_id) {
            return true;
        }

        // Allow if the user is the post author
        if ($user->id === $comment->post->user_id) {
            return true;
        }

        // Otherwise, deny
        return false;
    }
}

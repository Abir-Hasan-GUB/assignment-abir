<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $users = User::all();

        if ($posts->isEmpty() || $users->isEmpty()) {
            $this->command->warn('Please seed posts and users first.');
            return;
        }

        // Insert 5 random comments
        for ($i = 1; $i <= 5; $i++) {
            Comment::create([
                'body' => 'This is a comment body for Comment ' . $i . '. ' . Str::random(50),
                'post_id' => $posts->random()->id,
                'user_id' => $users->random()->id,
            ]);
        }
    }
}

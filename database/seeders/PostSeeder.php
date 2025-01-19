<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure you have categories and users seeded before running this
        $categories = Category::all();
        $users = User::all(); 

        if ($categories->isEmpty() || $users->isEmpty()) {
            $this->command->warn('Please seed categories and users first.');
            return;
        }

        // Insert 5 random posts
        for ($i = 1; $i <= 5; $i++) {
            Post::create([
                'title' => 'Post Title ' . Str::random(5),
                'description' => 'This is a description for Post ' . $i . '. ' . Str::random(50),
                'category_id' => $categories->random()->id,
                'user_id' => $users->random()->id,
            ]);
        }
    }
}

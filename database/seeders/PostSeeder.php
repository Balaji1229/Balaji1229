<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;



class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  
    public function run()
    {
        // Get all users
        $users = User::all();

        // Create a post for each user
        $users->each(function ($user) {
            $user->post()->create([
                'title' => 'First Post', // Example title
                'content' => 'This is the content of the first post.', // Example content
            ]);
        });
}
}
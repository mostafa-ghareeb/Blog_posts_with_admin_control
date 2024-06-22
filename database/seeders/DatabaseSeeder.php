<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(20)->create();
        // $users = User::all();
        // Post::factory(20)->create([
        //     'user_id' => $users->random()->id,
        // ]);

        

        // Create 20 random users
        $users = User::factory(20)->create();

        // Create 50 posts, each associated with a random user from the above-created users
        Post::factory(20)->make()->each(function ($post) use ($users) {
            $post->user_id = $users->random()->id;
            $post->save();
        });

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

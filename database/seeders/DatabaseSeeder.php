<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        Post::factory(10)->create();

        // $user = User::factory()->create([
        //     'name' => 'John'
        // ]);

        // Post::factory(10)->create([
        //     'user_id' => $user->id
        // ]);

        // $user = User::factory()->create();

        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);
        
        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $family->id,
        //     'title' => 'Family Post',
        //     'slug' => 'my-family-post',
        //     'excerpt' => '<p>Family is everything</p>',
        //     'body' => '<p>My family has a dog</p>'
        // ]);


        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'Work Post',
        //     'slug' => 'my-work-post',
        //     'excerpt' => '<p>Work is everything</p>',
        //     'body' => '<p>My work has a dog</p>'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

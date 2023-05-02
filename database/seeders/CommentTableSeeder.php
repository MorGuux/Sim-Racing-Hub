<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Comment();
        $c->body = 'This is the first comment.';
        $c->user_id = 1;
        $c->post_id = 1;
        $c->save();

        Comment::factory()->count(10)->create();    // Create 10 comments assigned to a random user and post

        Comment::factory()
            ->has(User::factory())    // Assign a random user to each comment
            ->has(Post::factory())    // Assign a random post to each comment
            ->count(10)               // 10 comments
            ->create();

    }
}
<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Post();
        $p->title = 'First Post';
        $p->body = 'This is the first post.';
        $p->user_id = 1;
        $p->car_id = 1;
        $p->track_id = 1;
        $p->save();

        Post::factory()
            ->count(10)
            ->create();   // Create 10 posts assigned to a random user
    }
}
<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\UserDetails;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User();
        $u->name = 'Test User';
        $u->email = 'test@test.com';
        $u->password = 'password123';
        $u->save();

        User::factory()
            ->has(UserDetails::factory()->count(1))       // 1 user details per user
            ->has(Post::factory()->count(3))    // 3 posts per user
            ->count(10)                         // 10 users
            ->create();
    }
}
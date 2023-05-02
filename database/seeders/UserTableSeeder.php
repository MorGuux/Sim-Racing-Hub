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
        $u->password = bcrypt('password123', ['rounds' => env('BCRYPT_ROUNDS')]);
        $u->is_admin = false;
        $u->save();

        $u2 = new User();
        $u2->name = 'Test Admin';
        $u2->email = 'admin@test.com';
        $u2->password = bcrypt('password123', ['rounds' => env('BCRYPT_ROUNDS')]);
        $u2->is_admin = true;
        $u2->save();

        User::factory()
            ->has(UserDetails::factory()->count(1))       // 1 user details per user
            ->has(Post::factory()->count(3))    // 3 posts per user
            ->count(10)                         // 10 users
            ->create();
    }
}

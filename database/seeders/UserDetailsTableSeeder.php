<?php

namespace Database\Seeders;

use App\Models\UserDetails;
use Illuminate\Database\Seeder;

class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new UserDetails();
        $u->favourite_simulator = 'iRacing';
        $u->favourite_car_id = 1;
        $u->favourite_track_id = 1;
        $u->user_id = 1;
        $u->save();

        UserDetails::factory()
            ->count(10)
            ->create();
    }
}
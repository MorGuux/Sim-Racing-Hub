<?php

namespace Database\Seeders;

use App\Models\Track;
use Illuminate\Database\Seeder;

class TrackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t = new Track();
        $t->name = 'Silverstone';
        $t->save();

        Track::factory()->count(10)->create();
    }
}
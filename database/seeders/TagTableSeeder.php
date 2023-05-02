<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = new Tag();
        $t1->name = 'Imagery';
        $t1->save();
        $t1->posts()->attach(1);

        $t2 = new Tag();
        $t2->name = 'Video';
        $t2->save();
        $t2->posts()->attach(2);
        $t2->posts()->attach(3);
        $t2->posts()->attach(4);
        $t2->posts()->attach(5);

        $t3 = new Tag();
        $t3->name = 'Setup';
        $t3->save();
        $t3->posts()->attach(3);
        $t3->posts()->attach(5);

        $t4 = new Tag();
        $t4->name = 'Livery';
        $t4->save();
        $t4->posts()->attach(4);
        $t4->posts()->attach(5);

        $t5 = new Tag();
        $t5->name = 'Tip';
        $t5->save();
        $t5->posts()->attach(5);

        $t6 = new Tag();
        $t6->name = 'Help';
        $t6->save();
        $t6->posts()->attach(3);
        $t6->posts()->attach(8);
        $t6->posts()->attach(10);

        $t7 = new Tag();
        $t7->name = 'Misc';
        $t7->save();
        $t7->posts()->attach(10);
    }
}
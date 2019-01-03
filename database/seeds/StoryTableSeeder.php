<?php

use Illuminate\Database\Seeder;
use App\Models\Story;

class StoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Story::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(Story::class, 10)->create();
    }
}

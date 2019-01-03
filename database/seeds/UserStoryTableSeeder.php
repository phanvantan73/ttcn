<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Story;
use Carbon\Carbon;

class UserStoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('user_story')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create();

        $userIds = User::pluck('id')->all();
        $storyIds = Story::pluck('id')->all();

        for ($i = 1; $i <= 30; $i++) {
            $time = '2018-' . '0' . rand(1, 9) . '-' . rand(10, 28) . ' '
                . rand(10, 23) . ':' . rand(11, 59) . ':' . rand(11, 59);
            DB::table('user_story')->insert([
                'user_id' => $faker->randomElement($userIds),
                'story_id' => $faker->randomElement($storyIds),
                'reading_chap' => rand(20, 30),
                'last_reading' => Carbon::createFromTimeString($time),
            ]);
        }
    }
}

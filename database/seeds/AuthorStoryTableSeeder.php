<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Author;
use App\Models\Story;

class AuthorStoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $authorIds = Author::pluck('id')->all();
        $storyIds = Story::pluck('id')->all();

        for ($i = 1; $i <= 30; $i++) {
            DB::table('author_story')->insert([
                'author_id' => $faker->randomElement($authorIds),
                'story_id' => $faker->randomElement($storyIds),
            ]);
        }
    }
}

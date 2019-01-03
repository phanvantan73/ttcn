<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(AuthorTableSeeder::class);
        $this->call(StoryTableSeeder::class);
        $this->call(ChapTableSeeder::class);
        $this->call(ProfileTableSeeder::class);
    }
}

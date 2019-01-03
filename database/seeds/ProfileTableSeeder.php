<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Profile::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(Profile::class, 10)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Chap;

class ChapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Chap::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(Chap::class, 50)->create();
    }
}

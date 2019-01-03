<?php

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Author::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(Author::class, 10)->create();
    }
}

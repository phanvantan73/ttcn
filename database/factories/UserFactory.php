<?php

use Faker\Generator as Faker;
use App\Models\Author;
use App\Models\Category;
use App\Models\Chap;
use App\Models\Profile;
use App\Models\Story;
use App\Models\User;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'tan12345',
        'remember_token' => str_random(10),
        'is_admin' => 0,
    ];
});
$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'image' => 'author.jpg',
    ];
});
$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => 'category.jpg',
    ];
});
$factory->define(Chap::class, function (Faker $faker) {
    $time = '2018-' . '0' . rand(1, 9) . '-' . rand(10, 28) . ' '
        . rand(10, 23) . ':' . rand(11, 59) . ':' . rand(11, 59);

    return [
        'name' => $faker->name,
        'content' => $faker->paragraph,
        'story_id' => rand(1, 10),
        'is_begin' => 0,
        'is_end' => 0,
        'created_at' => Carbon::createFromTimeString($time),
    ];
});
$factory->define(Profile::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'avatar' => 'avatar.jpg',
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'birthday' => '1995-06-19',
        'gender' => rand(0, 1),
        'user_id' => rand(1, 10),
    ];
});
$factory->define(Story::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => 'story.jpg',
        'description' => $faker->paragraph,
        'num_of_chaps' => rand(50, 70),
        'category_id' => rand(1, 10),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Album;
use App\Message;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Album::class, function (Faker $faker) {


        return [
            'user_id' => random_int(2,70),
            'image' => Str::random(10),
        ];

});

$factory->define(Message::class, function (Faker $faker) {
    return [
        'sender_id' => random_int(2,15),
        'sent_to_id' => 1,
        'body' => Str::random(10),
    ];
});


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'gender' => random_int(0,1),
        'city' => $faker->city,
        'country' => $faker->country,
        'status' => $faker->text($maxNbChars = 50),
        'about_me' => $faker->text($maxNbChars = 300),
        'age' => random_int(18,65),
    ];
});

<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user_name' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'first_name'=>$faker->firstNameMale,
        'last_name'=>$faker->lastName,
        'active'=>1,
        'password' => \Hash::make('secret'),
        'remember_token' => str_random(10),
    ];
});
